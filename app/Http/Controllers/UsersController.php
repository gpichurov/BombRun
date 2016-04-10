<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Statistics;
use Hash;
use File;
use Image;
use Storage;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

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
        //$user = User::where('id', $id)->first();

        if ($id == Auth::user()->id) {
            return redirect('/home');
        }

        $user = DB::table('users')
            ->join('statistics', 'users.id', '=', 'statistics.user_id')
            ->select('users.id', 'users.name', 'users.big_avatar', 'statistics.coins','statistics.kills',
                'statistics.scrolls', 'statistics.best_score', 'statistics.games')
            ->where('users.id', $id)
            ->first();

        return view('profile', compact('user'));
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
            'name' => 'required|max:10|unique:users',
        ]);

        Auth::user()->update(['name' => $request->name]);

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

    public function updateAvatar (Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image'
        ]);

        $this->saveAvatar($request);

        $request->session()->flash('alert-success', 'Avatar was successful changed!');
        return redirect('settings');
    }

    private function saveAvatar(Request $request) {

        $nameBig = 'B_' . time() . '_' . $request->file('avatar')->getClientOriginalName();
        $pathBig = storage_path('app/avatarImages/big/' . $nameBig);
        $nameSmall = 'S_' . time() . '_' . $request->file('avatar')->getClientOriginalName();
        $pathSmall = storage_path('app/avatarImages/small/' . $nameSmall);

        if ((Auth::user()->big_avatar ==! 'B_default.png') || (Auth::user()->small_avatar !== 'S_default.png')) {
            File::delete([base_path('storage/app/avatarImages/big/' . Auth::user()->big_avatar),
                base_path('storage/app/avatarImages/small/' . Auth::user()->small_avatar)]);
        }

        Image::make( $request->file('avatar')->getRealPath() )->resize(150, 150)->save($pathBig);
        Image::make( $request->file('avatar')->getRealPath() )->resize(50, 50)->save($pathSmall);

        Auth::user()->big_avatar = $nameBig;
        Auth::user()->small_avatar = $nameSmall;
        Auth::user()->save();

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
