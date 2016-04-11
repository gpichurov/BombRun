/**
 * Created by maya on 06-Apr-16.
 */

var test = JSON.parse(jsondata);
console.log(test);

var player = {
    defPosX: 300,
    defPosY: 200,
    playerCoins: 0,
    speed: 230,
    energy: 30
};

var map;
var cursors;

/*var speed = 35;*/

//var speedBoostLeft;

var maxSpeed = 260;

var speed = 230;
var playerCoins = 0;
var maxBombs = 300;
var energy = 300;

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


function updateData() {
    e.preventDefault();
    //alert('Sent');
    var data = {
       /* id: ,
        name: ,*/
        coins: playerCoins,
        bombs: maxBombs,
        speed: speed,
        scrolls: collectedScrolls,
        energy: energy
    };
    //console.log(data);
    $.ajax({
        method: "POST",
        url: "/game",
        data: {
            "data": JSON.stringify(data)
        }
    })
}
