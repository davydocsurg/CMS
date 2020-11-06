<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::where('id', '!=', Auth::user()->id)->simplePaginate(5));
    }

    public function editUser()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function updateUser(UpdateProfileRequest $request, User $user)
    {

        // $user = auth()->user();

        // $data = $request->only(['name', 'about']);

        $user->update([
            'name' => $request->name,
            'avatar' => $request->avatar,
            'about' => $request->about
        ]);

        // check if there's a new image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file->move(public_path(). '/prof/', $file->getClientOriginalName());
            $url = URL::to("/"). '/prof/'. $file->
            getClientOriginalName();

            // $data['avatar'] = $url;
            $avatar = $url;
        }

        $user->update();
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

    public function removeAdmin(user $user)
    {
        $user->role = 'writer';
        $user->save();

        \session()->flash('success', 'Admin role removed, Writer role set successfully');
        // session()->floor('success', 'Admin role set sucessfully');
        return redirect(route('users.index'));
    }

}