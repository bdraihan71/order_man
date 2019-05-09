<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subcategory;

class SubcatManagerController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('subcatman.index', compact('users'));
    }

    public function show(Request $request, User $user)
    {
        $managed = $user->manages->pluck('id')->toArray();
        $subcats = Subcategory::whereNotIn('id', $managed)->get();

        return view('subcatman.show', compact('user', 'subcats'));
    }

    public function add(Request $request, User $user)
    {
        $this->validate($request, [
            'subcat' => 'required|exists:subcategories,id',
        ]);

        if (count($user->manages->where('id', $request->subcat)) == 0) {
            $user->manages()->attach($request->subcat);
        }

        return back();
    }

    public function remove(Request $request, User $user, Subcategory $subcat)
    {
        if (count($user->manages->where('id', $subcat->id)) != 0) {
            $user->manages()->detach($subcat->id);
        }

        return back();
    }
}
