@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Statistics</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><img src="avatar/small/{{$user->small_avatar}}" alt=""><a href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->best_score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection