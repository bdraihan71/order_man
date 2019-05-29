<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        return view('stats.both.index');
    }
}
