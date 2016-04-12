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

var speedPotions = phpData.speed;
var speed = 120 + (speedPotions * 20);
if (speed >= 260) {
    speed = 260;
}
var playerCoins = 0;
var maxBombs = phpData.bombs;
var energyPotion = phpData.energy;
var energy = energyPotion * 10;

var invBox;
var items;

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

var energyPotionLabel;
var bombLabel;
var coinsText;
var scrollsLabel;
var speedLabel;
var energyLabel;

var coins;


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

var bmd;

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
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
