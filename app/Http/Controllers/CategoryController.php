<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use Carbon\Carbon;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    
    public function create()
    {
        return view('categories.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Category::create([
            'name' => $request->name,
            'description' =>  $request->description,
        ]);

        return redirect(route('categories.index'));
    }

 
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        
        return redirect(route('categories.index'));
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }
}
