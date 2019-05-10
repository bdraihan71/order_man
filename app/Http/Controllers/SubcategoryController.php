<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
        ]);

        Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' =>  $request->description,
        ]);

        return redirect(route('subcategories.index'));
    }

    public function show($id)
    {
        $subcategory = Subcategory::find($id);
        return view('subcategories.show', compact('subcategory'));
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('categories', 'subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
        ]);

        
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->description = $request->description;
        $subcategory->save();
        
        return redirect(route('subcategories.index'));
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect(route('subcategories.index'));
    }
}
