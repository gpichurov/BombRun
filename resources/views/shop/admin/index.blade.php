@extends('layouts.app')

@section('content')
    <div class="panel panel-default todo-panel">
        <div class="panel-heading clearfix">
            <h3 class="pull-left">SHOP</h3>
            <a href="{{ route('shop.admin.create') }}" class="btn btn-success pull-right">Add New</a>
        </div>
        <div class="panel-body">
            <ul class="list-group ">
                @if ($items->isEmpty())
                    <li class="list-group-item">
                        Sorry, no items found
                    </li>
                @else
                    @foreach($items as $item)
                        <li class="list-group-item clearfix">
                            <a href="{{ route('shop.admin.show', ['id' => $item->id]) }}">
                                <span class="pull-left">
                                    {{ $item->name }}
                                </span>
                            </a>
                            {{--<a href="{{ route('shop.admin.destroy', ['id' => $item->id]) }}"--}}
                               {{--onclick="return confirm('Are you sure');" class="btn btn-danger pull-right">Delete</a>--}}
                            {!! Form::open(['url' => route('shop.admin.destroy', ['id' => $item->id]), 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Are you sure');">Delete</button>
                            {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                            {!! Form::close() !!}
                            <a href="{{ route('shop.admin.edit', ['id' => $item->id]) }}" class="btn btn-info pull-right">Edit</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection