@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Statistics</h2>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th><a href="{{route('statistics.index', ['sort' => 'name'])}}">Name <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'coins'])}}">Coins <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'kills'])}}">Kills <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'scrolls'])}}">Scrolls <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'games'])}}">Games <span class="glyphicon glyphicon-menu-down"></span></a></th>
            </tr>
            </thead>
            <tbody>
            <?php $number = $users->firstItem()?>
            @foreach($users as $user)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td><img src="avatar/small/{{$user->small_avatar}}" alt=""><a href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->coins}}</td>
                    <td>{{$user->kills}}</td>
                    <td>{{$user->scrolls}}</td>
                    <td>{{$user->games}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <td colspan="6">{!! $users->appends(['sort' => $sort])->links() !!}</td>
            </tfoot>
        </table>
    </div>

@endsection