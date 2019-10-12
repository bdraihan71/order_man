<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Carbon\Carbon;

class ChannelController extends Controller
{
    
    public function index()
    {
        $channels = Channel::all();
        return view('channels.index', compact('channels'));
    }

    
    public function create()
    {
        return view('channels.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Channel::create([
            'name' => $request->name,
        ]);

        return redirect(route('channels.index'));
    }

    public function show($id)
    {
        $channel = Channel::find($id);
        return view('channels.show', compact('channel'));
    }

 
    public function edit(Channel $channel)
    {
        return view('channels.edit', compact('channel'));
    }

    public function update(Request $request, Channel $channel)
    {
        
        $request->validate([
            'name' => 'required',
        ]);

        
        $channel->name = $request->name;
        $channel->save();
        
        return redirect(route('channels.index'));
    }

    
    public function destroy(Channel $channel)
    {
        $channel->delete();
        return redirect(route('channels.index'));
    }
}
