@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <img src="profile/avatar/big/{{Auth::user()->big_avatar}}" alt="">
                    <h3>{{ Auth::user()->name }}</h3>
                    <h3>money:  {{ Auth::user()->inventory->money }}</h3>
                    <h3>bombs:  {{ Auth::user()->inventory->bombs }}</h3>
                    <h3>energy:  {{ Auth::user()->inventory->energy }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
