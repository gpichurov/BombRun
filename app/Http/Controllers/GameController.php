<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inventory;
use App\User;
use App\Statistic;
use Illuminate\Support\Facades\Input;
use Auth;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'receive']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $inventory = $user->inventory()->get();
        $data['id'] = $user->id;
        $data['bombs'] = $inventory[0]->bombs;
        $data['energy'] = $inventory[0]->energy;
        $data['speed'] = $inventory[0]->speed;

        $data = json_encode($data);

        return view('game', compact('data'));
    }

    public function receive(Request $request)
    {

        $inventory = Inventory::where('user_id', '=', $request->id)->first();
        $statistic = Statistic::where('user_id', '=', $request->id)->first();

        $inventory->energy = $request->energyPotions;
        $inventory->bombs = $request->bombs;
        $inventory->speed = $request->speedPotions;
        $inventory->money += $request->coins;
        $statistic->coins += $request->coins;
        $statistic->scrolls += $request->scrolls;
        $statistic->kills += $request->killedEnemies;
        $statistic->games += 1;
        $statistic->best_score += $request->coins + $request->scrolls * 10 + $request->killedEnemies * 10;

        $statistic->save();
        $inventory->save();
    }
}
