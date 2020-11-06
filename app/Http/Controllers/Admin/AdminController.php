<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Identicon\Identicon;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateUserRequest;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createuser.create')->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:8'
        ]);

         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            // 'type' => $request['type'],
            // 'bio' => $request['bio'],
            // 'photo' => $request['photo'],
            'password' => Hash::make($request['password']),
        ]);

        // message flash
        session()->flash('success', 'User created successfully.');

        // redirect user
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('createuser.create')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // $user = User::findOrFail($user);
        $data = $request->only(['name', 'email']);

        $user->update($data);

        // message flash
        session()->flash('success', 'User updated successfully.');

        // redirect user
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        // if ($user->posts->count() > 0) {
        //     session()->flash('error', 'User can\'t be deleted because it\'s associated some posts!.');
        //     return redirect()->back();
        // }

        $user->delete();

        session()->flash('success', 'User deleted successfully.');

        return redirect(route('users.index'));
    }
}
