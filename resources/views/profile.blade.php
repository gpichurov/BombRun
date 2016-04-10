@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 " >
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="">{{ $user->name }}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic" src="avatar/big/{{$user->big_avatar}}" class="img-thumbnail img-responsive">
                </div>
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td><img src="../images/top.png" alt=""></td>
                            <td><h3>Best Score:</h3></td>
                            <td><h3>{{$user->best_score}}</h3></td>
                        </tr>
                        <tr>
                            <td><img src="../images/monster.png" alt=""></td>
                            <td><h3>Total kills:</h3></td>
                            <td><h3>{{$user->kills}}</h3></td>
                        </tr>
                        <tr>
                            <td><img src="../images/coin.png" alt=""></td>
                            <td><h3>Coins collected:</h3></td>
                            <td><h3>{{$user->coins}}</h3></td>
                        </tr>
                        <tr>
                            <td><img src="../images/scroll.png" alt=""></td>
                            <td><h3>Scrolls collected:</h3></td>
                            <td><h3>{{$user->scrolls}}</h3></td>
                        </tr>
                        <tr>
                            <td><img src="../images/games.png" alt=""></td>
                            <td><h3>Total games played:</h3></td>
                            <td><h3>{{$user->games}}</h3></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--<div class="panel-footer"></div>--}}
    </div>
</div>
@endsection