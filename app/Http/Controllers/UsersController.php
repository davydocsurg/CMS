<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::latest()->get());
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request, User $user)
    {

        $user = auth()->user();

        $data = $request->only(['name', 'about']);

        // check if there's a new image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file->move(public_path(). '/prof/', $file->getClientOriginalName());
            $url = URL::to("/"). '/prof/'. $file->
            getClientOriginalName();

            $data['avatar'] = $url;
        }
        // $avatar = $url;

        // $user->update([
        //     'name' => $request->name,
        //     'avatar' => $avatar,
        //     'about' => $request->about
        // ]);

        $user->update($data);
        // $data->save();

        \session()->flash('success', 'Profile Updated sucessfully');

        return redirect()->back();
    }

    public function makeAdmin(user $user)
    {
        $user->role = 'admin';
        $user->save();

        \session()->flash('success', 'Admin role set sucessfully');
        // session()->floor('success', 'Admin role set sucessfully');
        return redirect(route('users.index'));
    }
}
