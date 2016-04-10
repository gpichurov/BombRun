/**
 * Created by maya on 06-Apr-16.
 */

var player = {
    defPosX: 600,
    defPosY: 250,
    posX: 600,
    posY: 250,
    posXbigDoor: 0,
    posYbigDoor: 0,
    posXmiddleDoor: 0,
    posYmiddleDoor: 0,
    posXdownDoor: 0,
    posYdownDoor: 0,
    playerCoins: 0,
    speed: 230,
    energy: 30
};

var map;
var cursors;

/*var speed = 35;*/
var speed = 230;
var speedBoostLeft;
var maxSpeed = 260;
var playerCoins = 0;

var maxBombs = 50;
var distancePassed = 0;

var energy = 30;

var mapBottomLayer;
var mapWallsLayer;

var bombs;
var bomb1;

/*var smallMaps;*/

var droppingBomb;
var bombButton;

var enemy1;
var enemy2;

var bombLabel;
var energyLabel;

var currentState = 'firstTown';

var killedEnemiesMine = false;
var killedEnemiesUnderw = false;
var killedEnemiesGreenUnderw = false;

var gotAScroll1 = false;
var gotAScroll2 = false;
var gotAScroll3 = false;

var room;
var countAllEnemies = 0;