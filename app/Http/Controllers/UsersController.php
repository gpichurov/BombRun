<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateName(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            Auth::user()->update(['name' => $request->name]);
        }

        $request->session()->flash('alert-success', 'Name was successful changed!');
        return redirect('settings');
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            'oldPassword' => 'required|max:255',
            'newPassword' => 'required|max:255|min:6|confirmed'
        ]);

        if (Hash::check($request->oldPassword, Auth::user()->password)) {
            Auth::user()->update(['password' => bcrypt($request->newPassword)]);
        }

        $request->session()->flash('alert-success', 'Password was successful changed!');
        return redirect('settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
