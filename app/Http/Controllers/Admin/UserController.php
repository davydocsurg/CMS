<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Profile;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::paginate(5))->with('title', Setting::first()->site_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')
            ->with('title', Setting::first()->site_name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'default.png',
        ]);

        session()->flash('success', 'User created successfully');

        return redirect()->route('users.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->profile->delete();
        $user->delete();

        \session()->flash('success', 'User deleted Successfully!');

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
