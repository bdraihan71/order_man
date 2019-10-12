<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('booked_by', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('home', compact('orders'));
    }
}
