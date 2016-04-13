@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="/style.css" rel="stylesheet">
    <script>jsondata = '{!! $data !!}';</script>

    <script type="text/javascript" src="bower_components/phaser/build/phaser.min.js"></script>

    <script type="text/javascript" src="js files/Enemy.js"></script>
    <script type="text/javascript" src="gameStates/boot.js"></script>
    <script type="text/javascript" src="gameStates/load.js"></script>
    <script type="text/javascript" src="js files/objects.js"></script>
    <script type="text/javascript" src="gameStates/firstTown.js"></script>
    <script type="text/javascript" src="gameStates/mineRoom.js"></script>
    <script type="text/javascript" src="gameStates/underworld.js"></script>
    <script type="text/javascript" src="gameStates/greenUnderworld.js"></script>
    <script type="text/javascript" src="gameStates/gameOver.js"></script>
    <script type="text/javascript" src="gameStates/startScreen.js"></script>
    <script type="text/javascript" src="gameStates/win.js"></script>
    <script type="text/javascript" src="game.js"></script>


    <div id="game-div" class=""></div>
@endsection