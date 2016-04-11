<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inventory;
class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['receive']]);
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

    public function receive()
    {
        $data = Input::json();

        $user = User::findOrFail($data['id']);


        dd($data);
    }
}
