<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Carbon\Carbon;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    
    public function create()
    {
        $roles = Role::all();
        $users = User::all();
        
        return view('users.create', compact('users', 'roles'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => bcrypt('bangladesh'),
            'email_verified_at' => Carbon::now(),
        ]);

        return redirect(route('users.index'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
 
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect(route('users.index'));
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
