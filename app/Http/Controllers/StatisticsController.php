<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->select('id', 'name', 'best_score', 'small_avatar')
            ->orderBy('best_score', 'desc')
            ->take(10)
            ->get();

        return view('/statistics', compact('users'));
    }
}
