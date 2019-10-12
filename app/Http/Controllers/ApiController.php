<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Service;
use Validator;

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
        
        $positiveResult = $this->validateRequest($request);

        if(!$positiveResult){
            return $positiveResult;
        }

        $customer = Customer::where('primary_contact_number', $request->mobile)->orWhere('secondary_contact_number', $request->mobile)->first();

        if($customer){
            $customer->name = $request->name;
            $customer->channel_id = $request->selected_channel;
            $customer->location_id = $request->selected_location;
            $customer->save();
        }else{
            $customer = Customer::create([
                'name' => $request->name,
                'primary_contact_number' => $request->mobile,
                'location_id' => $request->selected_location,
                'channel_id' => $request->selected_channel,
            ]);
        }


        return response()->json(
            [
                'success' => true,
                'data' => $customer
            ]
        );
    }

    public function validateRequest($request){
        
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|digits:11',
            'name' => 'required|not_in:null',
            'selected_location' => 'required|not_in:9999|exists:locations,id',
            'selected_channel' => 'required|not_in:9999|exists:channels,id',
            'selected_service' => 'required|not_in:9999|exists:services,id',
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
}
