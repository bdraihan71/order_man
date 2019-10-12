<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Subcategory;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        $subcategories = Subcategory::all();
        return view('service.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
        ]);

        Service::create([
            'subcategory_id' => $request->get('subcategory_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => 100 * $request->get('price'),
            'min_price' => 100 * $request->get('min_price'),
            'max_price' => 100 * $request->get('max_price'),
        ]);

        return redirect(route('services.index'));
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('service.show', compact('service'));
    }

    public function edit($id)
    {
        $subcategories = Subcategory::all();
        $service = Service::find($id);
        return view('service.edit', compact('service', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
        ]);

        $service = Service::find($id);
        $service->subcategory_id = $request->get('subcategory_id');
        $service->title = $request->get('title');
        $service->description = $request->get('description');
        $service->price = 100 * $request->get('price');
        $service->min_price = 100 * $request->get('min_price');
        $service->max_price = 100 * $request->get('max_price');
        $service->save();

        return redirect(route('services.index'));
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect(route('services.index'));
    }
}
