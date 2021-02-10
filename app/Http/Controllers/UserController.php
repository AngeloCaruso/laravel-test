<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePasswordRequest;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(User $model)
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('user.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    //Custom functions

    public function setPassword($token){
        return view('admin.users.password', compact('token'));
    }

    public function updatePassword(CreatePasswordRequest $request){

        $user = User::where('created_token', $request->token)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect('/login');
    }
}
