@extends('layouts.app')

@section('content')
    {{ $item->name }}<br>
    {{ $item->description }}<br>
    {{ $item->price }}<br>
    {{ $item->number }}<br>
    {{ $item->available }}<br>
    {{ $item->category }}<br>
@endsection