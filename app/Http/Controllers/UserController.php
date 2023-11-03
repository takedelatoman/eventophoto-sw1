<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'about_me' => 'required',
            'rol' => 'required',
            'ci' => 'required',
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone    = $request->phone;
        $user->location = $request->location;
        $user->about_me = $request->about_me;
        $user->rol      = $request->rol;
        $user->ci       = $request->ci;
        $user->photo    = $request->photo;
        $user->save();


        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone    = $request->phone;
        $user->location = $request->location;
        $user->about = $request->about;
        $user->rol      = $request->rol;
        $user->ci       = $request->ci;
        $user->photo1    = $request->photo1;
        $user->save();

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }


    public function editMyProfile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }


}
