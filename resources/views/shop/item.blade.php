@extends('layouts.app')

@section('content')
    <link href="/style.css" rel="stylesheet">
<div class="container col-sm-offset-4 col-sm-4">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <div class="panel panel-default text-center" style="padding: 1em">
        <div class="panel-heading">{{ $item->name }}</div>
        <div class="panel-body">
            <div class="col-xs-6">
                <img src="../../images/big/{{$item->big_image}}" alt="">
            </div>
            <div class="col-xs-6 text-justify">
                {{ $item->description }}<br>
            </div>
        </div>
        <div class="panel panel-default text-center">
            <table class="table panel-body">
                <tbody>
                <tr>
                    <td>Number of {{ $item->category }}:</td>
                    <td>
                        <img src="../images/{{ $item->category }}.png" height="20" width="20" alt="">
                        {{ $item->price }}
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <img src="../images/coins.png" height="20" width="20" alt="">
                        {{ $item->price }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {!! Form::open(['url' => url('shop/buy', ['id' => $item->id]), 'method' => 'POST']) !!}
                        <button type="submit" class="btn btn-success pull " onclick="return confirm('Are you sure');">Buy</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection