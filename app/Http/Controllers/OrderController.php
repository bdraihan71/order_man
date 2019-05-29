<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Service;
use App\Customer;
use App\User;
use App\OrderItem;
use App\Reference;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->item == null) {
            $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $customers_name = Customer::where('name', 'like', '%'.$request->item.'%')->get()->pluck('id')->toArray();
            $customers_p_phone = Customer::where('primary_contact_number', $request->item)->get()->pluck('id')->toArray();
            $customers_s_phone = Customer::where('secondary_contact_number', $request->item)->get()->pluck('id')->toArray();
            $customer_ids = array_merge($customers_name, $customers_p_phone, $customers_s_phone);
            $cust_orders = Order::whereIn('customer_id', $customer_ids)->orderBy('created_at', 'DESC')->get();

            $services = Service::where('title', $request->item)->get()->pluck('id')->toArray();
            $order_items = OrderItem::whereIn('service_id', $services)->get()->pluck('order_id')->toArray();
            $service_orders = Order::whereIn('id', $order_items)->orderBy('created_at', 'DESC')->get();

            $orders = $service_orders->merge($cust_orders);
            $orders = Order::whereIn('id', $orders->pluck('id')->toArray())->orderBy('created_at', 'DESC')->paginate(10);
        }


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
            'booked_at' => Carbon::now()->toDateTimeString(),
            'booked_by' => auth()->user()->id,
            'booking_note' => $request->booking_note
        ]);

        return redirect(route('add-item-to-order', $order->id));
    }

    public function getAddItem(Request $request, Order $order)
    {
        $users = User::where('role_id', 2)->get();
        $references = Reference::all();
        return view('orders.add-items', compact('order','references','users'));
    }

    public function addItem(Request $request, Order $order)
    {
        $this->validate($request, [
            'order_id' => 'required|exists:orders,id',
            'service_id' => 'required|exists:services,id',
            'service_price' => 'required|integer',
            'service_commission' => 'required|integer',
-           'category_manager' => 'required',
            'delivery_time' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
            'type' => 'required',
            'category_manager' => 'required',
            'reference_id' => 'required',
        ]);

        $delivery = null;

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
            'vendor_id' => $request->vendor_id,
            'category_manager' => $request->category_manager,
            'reference_id' => $request->reference_id,
            'type' => $request->type,
        ]);

        if ($request->continue == 1) {
            return view('orders.add-items', compact('order'));
        } else {
            return view('orders.show', compact('order'));
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
            'customer_id' => 'required',
            'booking_note' => 'nullable'
        ]);
        
        $order->customer_id = $request->customer_id;
        $order->booking_note = $request->booking_note;
        $order->booked_by = auth()->user()->id;
        $order->save();

        return redirect(route('orders.show', ['id' => $order->id]));
    }

    public function updateItem(Request $request, OrderItem $item)
    {
        $this->validate($request, [
            'service_id' => 'required|exists:services,id',
            'service_price' => 'required|integer',
            'service_commission' => 'required|integer',
            'vendor_id' => 'required|exists:vendors,id',
            'delivery_time' => 'required',
            'category_manager' => 'required',
            'reference_id' => 'required',
            'type' => 'required'
        ]);

        $item->service_id = $request->service_id;
        $item->vendor_id = $request->vendor_id;
        $item->service_price = $request->service_price;
        $item->service_commission = $request->service_commission;
        $item->review = $request->review;
        $item->delivery_time = $request->delivery_time;
        $item->comment_by_category_manager = $request->comment_by_category_manager;
        $item->type = $request->type;
        $item->category_manager = $request->category_manager;
        $item->reference_id = $request->reference_id;
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

    public function action(Request $request, Order $order)
    {
        return view('orders.action', compact('order'));
    }

    public function takeAction(Request $request, Order $order)
    {
        $this->validate($request, [
            'action' => 'required',
            'action_note' => 'nullable'
        ]);

        $order->action = $request->action;
        $order->action_note = $request->action_note;
        $order->action_by = auth()->user()->id;
        $order->action_at = Carbon::now()->toDateTimeString();
        $order->save();

        return redirect(route('orders.show', ['order' => $order->id]));
    }
}
