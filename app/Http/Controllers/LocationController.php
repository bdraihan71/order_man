<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Carbon\Carbon;

class LocationController extends Controller
{
    
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    
    public function create()
    {
        return view('locations.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Location::create([
            'name' => $request->name,
        ]);

        return redirect(route('locations.index'));
    }

    public function show($id)
    {
        $location = Location::find($id);
        return view('locations.show', compact('location'));
    }

 
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        
        $request->validate([
            'name' => 'required',
        ]);

        
        $location->name = $request->name;
        $location->save();
        
        return redirect(route('locations.index'));
    }

    
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect(route('locations.index'));
    }
}
