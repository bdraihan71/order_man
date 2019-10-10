<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class OrderV2Controller extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        return view('v2.orders.create', compact('customers'));
    }
}
