@extends('layouts.app')

@section('content')
    <div class="container col-sm-offset-4 col-sm-4">
        <div class="panel panel-default text-center">
            <div class="panel-heading">{{ $item->name }}</div>
            <div class="panel-body">
                <div class="">
                    <img src="../../images/big/{{$item->big_image}}" alt="">
                    {{ $item->description }}<br>
                </div>

                {{ $item->price }}<br>
                {{ $item->number }}<br>
                {{ $item->available }}<br>
                {{ $item->category }}<br>
                <div >
                    <a href="{{ route('shop.admin.edit', ['id' => $item->id]) }}" class="btn btn-info ">Edit</a>
                    {!! Form::open(['url' => route('shop.admin.destroy', ['id' => $item->id]), 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure');">Delete</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@endsection