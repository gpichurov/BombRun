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

        //return $data;
        return view('game', compact('data'));
    }

    public function receive(Request $request)
    {
        $data = Input::json();

        dd($data);
        $id = $data->get('id');
        $user = User::where('id', '=', $id)->first();


        $inventory = Inventory::where('user_id', '=', $id)->first();
        $statistic = Statistic::where('user_id', '=', $id)->first();
        $inv = $data->get('bombs');

        $inventory->energy = $data->get('energy');
        $inventory->speed = $data->get('speed');
        $inventory->money = $data->get('coins');
        $statistic->coins = $data->get('coins');
        $statistic->scrolls = $data->get('scrolls');
        $statistic->games = 1;

        $statistic->save();
        $inventory->save();
        //$statistic->update(['coins' => $data->get('coins')]);
        //$inventory->update(['bombs' => $data->get('bombs'), 'energy' => $data->get('energy'), 'speed' => $data->get('speed')]);
        //dd($user->inventory);
    }
}
