@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2 class="">Statistics</h2>
            <div class="pull-right col-sm-3">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search player..." name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default"  type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th class="col-sm-3">Name</th>
                <th><a href="{{route('statistics.index', ['sort' => 'coins', 'dir' => $dir, 'lastSort' => $sort])}}">
                        Coins <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'kills', 'dir' => $dir, 'lastSort' => $sort])}}">
                        Kills <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'scrolls', 'dir' => $dir, 'lastSort' => $sort])}}">
                        Scrolls <span class="glyphicon glyphicon-sort"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'games', 'dir' => $dir, 'lastSort' => $sort])}}">
                        Games <span class="glyphicon glyphicon-menu-down"></span></a></th>
                <th><a href="{{route('statistics.index', ['sort' => 'best_score', 'dir' => $dir, 'lastSort' => $sort])}}">
                        Best Score <span class="glyphicon glyphicon-menu-down"></span></a></th>
            </tr>
            </thead>
            <tbody>
            <?php $number = $users->firstItem()?>
            @foreach($users as $user)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td><img src="avatar/small/{{$user->small_avatar}}" alt=""><a href="/profile/{{$user->id}}">&nbsp;&nbsp;{{$user->name}}</a></td>
                    <td>{{$user->coins}}</td>
                    <td>{{$user->kills}}</td>
                    <td>{{$user->scrolls}}</td>
                    <td>{{$user->games}}</td>
                    <td>{{$user->best_score}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <td colspan="7">{!! $users->appends(['sort' => $sort])->links() !!}</td>
            </tfoot>
        </table>
    </div>

@endsection