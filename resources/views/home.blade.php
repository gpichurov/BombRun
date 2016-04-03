@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    @if(Auth::user()->isAdmin())
                        <a href="{{ url('/admin') }}">To admin panel</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
