<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Statistics;
use DB;

class StatisticsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if  (!$request->sort) {
            $sort = 'kills';
        } else {
            $sort = $request['sort'];
        }
        //dd($request);
        $users = DB::table('users')
            ->select('id', 'name', 'coins','kills', 'scrolls', 'games', 'small_avatar')
            ->orderBy($sort, 'desc')
            ->paginate(10);
        return view('/statistics', compact('users', 'sort'));
    }
}
