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
        $subcategorys = Subcategory::all();
        return view('service.create', compact('subcategorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Service::create([
            'subcategory_id' => $request->subcategory_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect(route('services.index'));
    }

    public function edit($id)
    {
        $subcategorys = Subcategory::all();
        $service = Service::find($id);
        return view('service.edit', compact('service', 'subcategorys'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $service = Service::find($id);
        $service->subcategory_id = $request->get('subcategory_id');
        $service->title = $request->get('title');
        $service->description = $request->get('description');
        $service->price = $request->get('price');
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
