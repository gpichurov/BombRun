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

var maxSpeed = 260;

var userId = '';
userId = phpData.id;

var speedPotions = phpData.speed;

var speed = 120;

var playerCoins = 0;
var maxBombs = 0;
maxBombs = phpData.bombs;
var energyPotion = 0;
energyPotion = phpData.energy;
var energy = 30;

var invBox;
var items;

var distancePassed = 0;

var bombs;

var energyPotionLabel;
var bombLabel;
var coinsText;
var scrollsLabel;
var speedPotionLabel;
var speedLabel;
var energyLabel;

var coins;

var currentState = 'firstTown';

var room;
var countAllEnemies = 0;
var pauseButton;

var setKey = true;
var setScroll = true;

var collectedScrolls = 0;

var roomsEntered = 0;
var data;

var bmd;

function updateData() {
    data = {
        id: userId,
        coins: playerCoins,
        bombs: maxBombs,
        speed: speed,
        speedPotions: speedPotions,
        scrolls: collectedScrolls,
        energy: energy,
        energyPotions: energyPotion,
        killedEnemies: countAllEnemies
    };

    $.ajax({
        method: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/game",
        data: data,
        success: function (p) {
        },error:function() {
            alert("error!!!!");
        }
    });
}
