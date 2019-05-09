<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Service;
use App\Customer;
use App\User;
use App\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();

        return view('orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required'
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
        ]);

        return view('orders.add-items', compact('order'));
    }

    public function getAddItem(Request $request, Order $order)
    {
        return view('orders.add-items', compact('order'));
    }

    public function addItem(Request $request, Order $order)
    {
        $this->validate($request, [
            'order_id' => 'required|exists:orders,id',
            'service_id' => 'required|exists:services,id',
            'service_price' => 'required|integer',
            'service_commission' => 'required|integer',
            'delivery_time' => 'required',
            'type' => 'required'
        ]);

        $cancel = null;
        $booked = null;
        $fullfill = null;
        $delivery = null;

        if ($request->cancelled_at != null) {
            $cancel = Carbon::parse($request->cancelled_at)->toDateTimeString();
        }
        
        if ($request->booked_at != null) {
            $booked = Carbon::parse($request->booked_at)->toDateTimeString();
        }

        if ($request->fullfilled_at != null) {
            $fullfill = Carbon::parse($request->fullfilled_at)->toDateTimeString();
        }

        if ($request->delivery_time != null) {
            $delivery = Carbon::parse($request->delivery_time)->toDateTimeString();
        }

        $item = OrderItem::create([
            'order_id' => $request->order_id,
            'service_id' => $request->service_id,
            'service_price' => $request->service_price,
            'service_commission' => $request->service_commission,
            'review' => $request->review,
            'delivery_time' => $request->delivery_time,
            'booked_by' => $request->booked_by,
            'type' => $request->type,
        ]);

        if ($request->continue) {
            return view('orders.add-items', compact('order'));
        } else {
            return redirect(route('orders.index'));
        }
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'customers'));
    }

    public function editItem(OrderItem $item)
    {
        return view('orders.edit-item', compact('item'));
    }

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'customer_id' => 'required'
        ]);
        
        $order->customer_id = $request->customer_id;
        $order->save();

        return redirect(route('orders.show', ['id' => $order->id]));
    }

    public function updateItem(Request $request, OrderItem $item)
    {
        $this->validate($request, [
            'service_id' => 'required|exists:services,id',
            'service_price' => 'required|integer',
            'service_commission' => 'required|integer',
            'delivery_time' => 'required',
            'type' => 'required'
        ]);

        $cancel = null;
        $booked = null;
        $fullfill = null;

        if ($request->cancelled_at != null) {
            $cancel = Carbon::parse($request->cancelled_at)->toDateTimeString();
        }
        
        if ($request->booked_at != null) {
            $booked = Carbon::parse($request->booked_at)->toDateTimeString();
        }

        if ($request->fullfilled_at != null) {
            $fullfill = Carbon::parse($request->fullfilled_at)->toDateTimeString();
        }

        $item->service_id = $request->service_id;
        $item->vendor_id = $request->vendor_id;
        $item->service_price = $request->service_price;
        $item->service_commission = $request->service_commission;
        $item->review = $request->review;
        $item->delivery_time = $request->delivery_time;
        $item->booked_at =  $booked;
        $item->booked_by = $request->booked_by;
        $item->comment_by_category_manager = $request->comment_by_category_manager;
        $item->booking_note = $request->booking_note;
        $item->cancelled_at =  $cancel;
        $item->cancelled_by = $request->cancelled_by;
        $item->cancellation_note = $request->cancellation_note;
        $item->fullfilled_at =  $fullfill;
        $item->fullfilled_by = $request->fullfilled_by;
        $item->fullfillment_note = $request->fullfillment_note;
        $item->type = $request->type;
        $item->save();

        return redirect(route('orders.show', ['id' => $item->order->id]));
    }

    public function destroy(Request $request, Order $order)
    {
        $order->delete();
        
        return redirect(route('orders.index'));
    }

    public function destroyItem(Request $request, OrderItem $item)
    {
        $item->delete();

        return back();
    }
}
