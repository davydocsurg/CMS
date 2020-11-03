<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

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

        // $user->update([
        //     'name' => $request->name,
        //     'avatar' => $request->avatar,
        //     'about' => $request->about
        // ]);

        // check if there's a new image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file->move(public_path(). '/profile/', $file->getClientOriginalName());
            $url = URL::to("/"). '/profile/'. $file->getClientOriginalName();

            $data['avatar'] = $url;
        }

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
