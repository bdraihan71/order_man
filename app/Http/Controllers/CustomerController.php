<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Location;
use Carbon\Carbon;

class CustomerController extends Controller
{
   
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

  
    public function create()
    {
        $locations = Location::all();
        return view('customers.create', compact('locations'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_id' => 'required|exists:locations,id',
        ]);

        Customer::create([
            'name' => $request->name,
            'primary_contact_number' => $request->primary_contact_number,
            'secondary_contact_number' => $request->secondary_contact_number,
            'profession'  => $request->profession,
            'location_id' => $request->location_id,
        ]);

        return redirect(route('customers.index'));
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $locations = Location::all();
        return view('customers.edit', compact('customer', 'locations'));
    }

   
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'primary_contact_number' => 'required',
            'secondary_contact_number' => 'nullable',
            'profession'  => 'nullable',
            'location_id' => 'required|exists:locations,id',
        ]);

        $customer->name = $request->name;
        $customer->primary_contact_number = $request->primary_contact_number;
        $customer->secondary_contact_number = $request->secondary_contact_number;
        $customer->profession= $request->profession;
        $customer->location_id = $request->location_id;
        $customer->save();

        return redirect(route('customers.index'));
    }

   
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customers.index'));
    }
}
