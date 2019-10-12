<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Location;
use App\Channel;
use App\Service;

class OrderV2Controller extends Controller
{
    public function create()
    {
        $locations = Location::orderBy('name')->get();
        $channels = Channel::orderBy('name')->get();
        $services = Service::orderBy('title')->get();
        return view('v2.orders.create', compact('locations', 'channels', 'services'));
    }
}
