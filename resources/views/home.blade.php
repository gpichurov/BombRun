@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<img src="profile/avatar/big/{{Auth::user()->big_avatar}}" alt="">--}}
                    {{--<h3>{{ Auth::user()->name }}</h3>--}}
                    {{--<h3>money:  {{ Auth::user()->inventory->money }}</h3>--}}
                    {{--<h3>bombs:  {{ Auth::user()->inventory->bombs }}</h3>--}}
                    {{--<h3>energy:  {{ Auth::user()->inventory->energy }}</h3>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 " >
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ Auth::user()->name }}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic" src="profile/avatar/big/{{Auth::user()->big_avatar}}" class="img-thumbnail img-responsive">
                </div>
                <div class="col-md-9 col-lg-9">
                    <div class=" panel panel-default" style="">
                        <div class="panel-heading">
                            <h2>Stats</h2>
                        </div>
                        <table class="table  panel-body">
                            <tbody>
                            <tr>
                                <td><img src="images/top.png" alt=""></td>
                                <td><h4>Best Score:</h4></td>
                                <td><h4>{{Auth::user()->statistic->best_score}}</h4></td>
                            </tr>
                            <tr>
                                <td><img src="images/monster.png" alt=""></td>
                                <td><h4>Total kills:</h4></td>
                                <td><h4>{{Auth::user()->statistic->kills}}</h4></td>
                            </tr>
                            <tr>
                                <td><img src="images/coins.png" alt=""></td>
                                <td><h4>Coins collected:</h4></td>
                                <td><h4>{{Auth::user()->statistic->coins}}</h4></td>
                            </tr>
                            <tr>
                                <td><img src="images/scroll.png" alt=""></td>
                                <td><h4>Scrolls collected:</h4></td>
                                <td><h4>{{Auth::user()->statistic->scrolls}}</h4></td>
                            </tr>
                            <tr>
                                <td><img src="images/games.png" alt=""></td>
                                <td><h4>Total games played:</h4></td>
                                <td><h4>{{Auth::user()->statistic->games}}</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default" style="margin:2em ">
            <div class="panel-heading">
                <h2>Inventory</h2>
            </div>
            <table class="table  panel-body">
                <tbody>
                <tr>
                    <td><img src="images/coins.png" alt=""></td>
                    <td><h4>Money:</h4></td>
                    <td><h4>{{Auth::user()->inventory->money}}</h4></td>
                </tr>
                <tr>
                    <td><img src="images/bombs.png" alt=""></td>
                    <td><h4>Bombs:</h4></td>
                    <td><h4>{{Auth::user()->inventory->bombs}}</h4></td>
                </tr>
                <tr>
                    <td><img src="images/energy.png" alt=""></td>
                    <td><h4>Energy potions:</h4></td>
                    <td><h4>{{Auth::user()->inventory->energy}}</h4></td>
                </tr>
                <tr>
                    <td><img src="images/speed.png" alt=""></td>
                    <td><h4>Speed potions:</h4></td>
                    <td><h4>{{Auth::user()->inventory->speed}}</h4></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
