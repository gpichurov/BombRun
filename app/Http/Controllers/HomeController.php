<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Image::make('http://graph.facebook.com/v2.5/1347720765254260/picture?type=large')
//            ->save(storage_path('app/itemImages/small/' . 'dada.png'));
        return view('home');
    }
}
