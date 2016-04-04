@extends('layouts.app')

@section('content')
    {{ $item->name }}<br>
    {{ $item->description }}<br>
    {{ $item->price }}<br>
    {{ $item->number }}<br>
    {{ $item->available }}<br>
    {{ $item->category }}<br>
    {!! Form::open(['url' => route('shop.admin.destroy', ['id' => $item->id]), 'method' => 'DELETE']) !!}
    <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Are you sure');">Delete</button>
    {!! Form::close() !!}
    <a href="{{ route('shop.admin.edit', ['id' => $item->id]) }}" class="btn btn-info pull-right">Edit</a>
@endsection