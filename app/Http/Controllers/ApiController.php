<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

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
}
