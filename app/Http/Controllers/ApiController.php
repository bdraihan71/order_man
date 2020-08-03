<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Service;
use Validator;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use App\Vendor;
class ApiController extends Controller
{
    public function getCustomer($mobile){
        $customer = Customer::where('primary_contact_number', $mobile)->orWhere('secondary_contact_number', $mobile)->first();
        if($customer != null){
            return response()->json(
                [
                    'success' => true,
                    'data' => $customer
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function getCustomerFromEmail($email){
        $customer = Customer::where('email', $email)->orWhere('email_secondary', $email)->first();
        if($customer != null){
            return response()->json(
                [
                    'success' => true,
                    'data' => $customer
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function getService(Service $service){
        
        if($service != null){
            return response()->json(
                [
                    'success' => true,
                    'data' => $service
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function order(Request $request){
        //"selected_location": "1", "mobile": "01674983245", "name": "Prince", "selected_channel": "1", 


        //"selected_service": "2", "selected_type": "9999", "price": "2626", "date": "2019-10-26", "time": "16:00",
        // "address": "test", "note": "test"
        
        $result = $this->validateRequest($request);

        if($result !== true){ 
            return $result;
        }

        $customer = $this->getCustomerFromMobile($request);

        $order = $this->createOrder($customer, $request);

        return response()->json(
            [
                'success' => true,
                'button' => true,
                'data' => "Successfully created order # " . $order->id,
                'redirect' => route('orders.show', $order->id)
            ]
        );
    }

    public function validateRequest($request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
            'email' => 'required|email',
            'name' => 'required|not_in:null',
            'user_id' => 'required|exists:users,id',
            'selected_location' => 'required|not_in:9999|exists:locations,id',
            'selected_channel' => 'required|not_in:9999|exists:channels,id',
            'selected_service' => 'required|not_in:9999|exists:services,id',
            'vendor_id' => 'required|not_in:9999|exists:vendors,id',
            'selected_type' => 'required|not_in:9999',
            'date' => 'required|not_in:null',
            'time' => 'required|not_in:null',
            'address' => 'required|not_in:null',
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'data' => $validator->errors()
                ]
            );
        }
        $service = Service::find($request->selected_service);

        $validator = Validator::make($request->all(), [
           'price' => 'required|numeric|min:'. $service->min_price . '|max:' . $service->max_price . '',
           'quantity' => 'required|numeric|min:1',
           'total' => 'required|numeric|min:1',
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'data' => $validator->errors()
                ]
            );
        }

        return true;
    }

    public function getCustomerFromMobile($request){

        $customer = Customer::where('primary_contact_number', $request->mobile)->orWhere('secondary_contact_number', $request->mobile)->first();

        if($customer){
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->channel_id = $request->selected_channel;
            $customer->location_id = $request->selected_location;
            $customer->save();
        }else{
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'primary_contact_number' => $request->mobile,
                'location_id' => $request->selected_location,
                'channel_id' => $request->selected_channel,
            ]);
        }

        return $customer;
    }

    public function createOrder($customer, $request){
        $order = Order::create([
            'customer_id' => $customer->id,
            'booked_at' => Carbon::now()->toDateTimeString(),
            'booked_by' => $request->user_id,
            'booking_note' => $request->note == 'null'?'': $request->note
        ]);


        $item = OrderItem::create([
            'order_id' => $order->id,
            'service_id' => $request->selected_service,
            'service_price' => $request->price,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'delivery_date' => $request->date,
            'delivery_time' => $request->time,
            'delivery_address' => $request->address,
            'vendor_id' => $request->vendor_id ? $request->vendor_id : '',
            'type' => $request->selected_type,
        ]);

        return $order;
    }

    public function pendingOrder(Request $request)
    {
        $result = $this->validateRequestPending($request);

        if($result !== true){ 
            return $result;
        }

        $customer = $this->getCustomerFromMobile($request);

        $order = $this->createPendingOrder($customer, $request);

        return response()->json(
            [
                'success' => true,
                'button' => true,
                'data' => "Successfully created order # " . $order->id,
                'redirect' => route('orders.show', $order->id)
            ]
        );
    }

    public function validateRequestPending($request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
            'email' => 'required|email',
            'name' => 'required|not_in:null',
            'user_id' => 'required|exists:users,id',
            'selected_location' => 'required|not_in:9999|exists:locations,id',
            'selected_channel' => 'required|not_in:9999|exists:channels,id',
            'selected_service' => 'required|not_in:9999|exists:services,id',
            'selected_type' => 'required|not_in:9999',
            'date' => 'required|not_in:null',
            'time' => 'required|not_in:null'
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'data' => $validator->errors()
                ]
            );
        }
        $service = Service::find($request->selected_service);

        $validator = Validator::make($request->all(), [
           'price' => 'required|numeric|min:'. $service->min_price . '|max:' . $service->max_price . '',
           'quantity' => 'required|numeric|min:1',
           'total' => 'required|numeric|min:1',
        ]);

        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'data' => $validator->errors()
                ]
            );
        }

        return true;
    }

    public function createPendingOrder($customer, $request){
        $order = Order::create([
            'customer_id' => $customer->id,
            'booked_at' => Carbon::now()->toDateTimeString(),
            'booked_by' => $request->user_id,
            'action' => $request->action,
            'booking_note' => $request->note == 'null'?'': $request->note
        ]);


        $item = OrderItem::create([
            'order_id' => $order->id,
            'service_id' => $request->selected_service,
            'service_price' => $request->price,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'followup_date' => $request->date,
            'followup_time' => $request->time,
            'type' => $request->selected_type,
        ]);

        return $order;
    }
    public function vendor(Request $request){
        if($request->selected_service && $request->selected_service != 9999){
            $vendors = Vendor::where('category_id', Service::find($request->selected_service)->subcategory->category->id )->orderBy('company_name')->get();
        }else{
            $vendors = Vendor::orderBy('company_name')->get();
        }
        

        return response()->json(
            [
                'success' => true,
                'data' => $vendors
            ]
        );
    }
}
