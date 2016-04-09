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
        if ((!$request->dir) || ($request->dir == 'asc') || ($request->sort != $request->lastSort)) {
            $dir = 'desc';
        } else {
            $dir = 'asc';
        }

        if  (!$request->sort) {
            $sort = 'best_score';
        } else {
            $sort = $request['sort'];
        }
        //dd($request['search']);
        $users = DB::table('users')
            ->join('statistics', 'users.id', '=', 'statistics.user_id')
            ->select('users.id', 'users.name', 'users.small_avatar', 'statistics.coins','statistics.kills',
                'statistics.scrolls', 'statistics.best_score', 'statistics.games')
            ->where('users.name', 'like', '%' . $request['search'] . '%' )
            ->orderBy($sort, $dir)
            ->paginate(10);
        return view('/statistics', compact('users', 'sort', 'dir'));
    }
}
