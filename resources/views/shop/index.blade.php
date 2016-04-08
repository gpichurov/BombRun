@extends('layouts.app')
@section('content')
    <div class="panel panel-default todo-panel">
        <div class="panel-heading clearfix">
            <h3 class="pull-left">SHOP</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group ">
                @if ($items->isEmpty())
                    <li class="list-group-item">
                        Sorry, no items found
                    </li>
                @else
                    @foreach($items as $item)
                        @if ($item->available)
                            <li class="list-group-item clearfix">
                                <a href="{{ route('shop.show', ['id' => $item->id]) }}">
                                    <span class="pull-left">
                                        <img src="images/small/{{$item->small_image}}" alt="">
                                    </span>
                                    <span class="pull-left">
                                        {{ $item->name }}
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection