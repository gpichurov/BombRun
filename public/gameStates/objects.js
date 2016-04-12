/**
 * Created by maya on 06-Apr-16.
 */

var phpData = JSON.parse(jsondata);

var player = {
    defPosX: 300,
    defPosY: 200
};

var map;
var cursors;

/*var speed = 35;*/

//var speedBoostLeft;

var maxSpeed = 260;

var userId = phpData.id;
var speed = 120;
var speedPotions = phpData.speed;
var playerCoins = 0;
var maxBombs = phpData.bombs;
var energy = phpData.energy;

var distancePassed = 0;

//var mapBottomLayer;
//var mapWallsLayer;

var bombs;
//var bomb1;

/*var smallMaps;*/

/*var droppingBomb;*/
//var bombButton;
/*
var enemy1;
var enemy2;*/

//var bombLabel;
//var energyLabel;

var currentState = 'firstTown';

/*var killedEnemiesMine = false;
var killedEnemiesUnderw = false;
var killedEnemiesGreenUnderw = false;

var gotAScroll1 = false;
var gotAScroll2 = false;
var gotAScroll3 = false;*/

var room;
var countAllEnemies = 0;

var setKey = true;
var setScroll = true;

var collectedScrolls = 0;

//var coinsCollected = [];

var roomsEntered = 0;
var data;

function updateData() {
    //alert('Sent');
    data = {
        id: userId,
        coins: playerCoins,
        bombs: maxBombs,
        speed: speed,
        scrolls: collectedScrolls,
        energy: energy
    };

    //console.log(p);
    $.ajax({
        method: "POST",
        url: "/game",
        data: data,
        success: function (p) {
            console.log(p);
        },error:function() {
            alert("error!!!!");
        }
    }).then(function( msg ) {
        //console.log(arguments);
        //alert(msg);

    }, function( msg ) {
        //console.log(arguments);
        //alert(msg);

    });
}
