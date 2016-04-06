@extends('layouts.app')

@section('content')
    <img src="../../images/big/{{$item->big_image}}" alt=""><br>
    {{ $item->name }}<br>
    {{ $item->description }}<br>
    {{ $item->price }}<br>
    {{ $item->number }}<br>
    {{ $item->available }}<br>
    {{ $item->category }}<br>
@endsection