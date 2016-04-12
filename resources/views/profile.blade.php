@extends('layouts.app')

@section('content')
<link href="/style.css" rel="stylesheet">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 " >
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">{{ $user->name }}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic" src="../profile/avatar/big/{{$user->big_avatar}}" class="img-thumbnail img-responsive">
                </div>
                <div class="col-md-9 col-lg-9">
                    <div class=" panel panel-default" style="">
                        <div class="panel-heading">
                            <h2 class="text-center">Stats</h2>
                        </div>
                        <table class="table  panel-body">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td><img src="../images/monster.png" alt=""></td>
                                    <td><h3>Total kills:</h3></td>
                                    <td><h3>{{$user->kills}}</h3></td>
                                </tr>
                                <tr>
                                    <td><img src="../images/coins.png" alt=""></td>
                                    <td><h3>Coins collected:</h3></td>
                                    <td><h3>{{$user->coins}}</h3></td>
                                </tr>
                                <tr>
                                    <td><img src="../images/scroll.png" alt=""></td>
                                    <td><h3>Scrolls collected:</h3></td>
                                    <td><h3>{{$user->scrolls}}</h3></td>
                                </tr>
                                <tr>
                                    <td><img src="../images/game.png" alt=""></td>
                                    <td><h3>Total games played:</h3></td>
                                    <td><h3>{{$user->games}}</h3></td>
                                </tr>
                                <tr>
                                    <td><img src="../images/top.png" alt=""></td>
                                    <td><h3>Score:</h3></td>
                                    <td><h3>{{$user->best_score}}</h3></td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        @if($user->id == Auth::user()->id)
        <div class="panel panel-default" style="margin:2em ">
            <div class="panel-heading">
                <h2 class="text-center">Inventory</h2>
            </div>
            <table class="table  panel-body">
                <tbody>
                <tr>
                    <td><img src="../images/coins.png" alt=""></td>
                    <td><h4>Coins:</h4></td>
                    <td><h4>{{Auth::user()->inventory->money}}</h4></td>
                </tr>
                <tr>
                    <td><img src="../images/bombs.png" alt=""></td>
                    <td><h4>Bombs:</h4></td>
                    <td><h4>{{Auth::user()->inventory->bombs}}</h4></td>
                </tr>
                <tr>
                    <td><img src="../images/energy.png" alt=""></td>
                    <td><h4>Energy potions:</h4></td>
                    <td><h4>{{Auth::user()->inventory->energy}}</h4></td>
                </tr>
                <tr>
                    <td><img src="../images/speed.png" alt=""></td>
                    <td><h4>Speed potions:</h4></td>
                    <td><h4>{{Auth::user()->inventory->speed}}</h4></td>
                </tr>
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
