<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::all();
        return view('reference.index', compact('references'));
    }

    public function create()
    {
       return view('reference.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

    
        Reference::create([
           'name' => $request->get('name'),
        ]);

        return redirect(route('reference.index'));
    }

    public function show($id)
    {
        $reference = Reference::find($id);
        return view('reference.show', compact('reference'));
    }
    
    public function edit($id)
    {
        $reference = Reference::find($id);
        return view('reference.edit', compact('reference'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $reference = Reference::find($id);
        $reference->name = $request->get('name');
        $reference->save();
        return redirect(route('reference.index'));

    }

    public function destroy($id)
    {
        $reference = Reference::find($id);
        $reference->delete();
        return redirect(route('reference.index'));
    }
}
