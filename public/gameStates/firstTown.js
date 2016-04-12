/**
 * Created by maya on 03-Apr-16.
 */
var coins;
var coinsText;

var reg = {};



function showModal() {
    reg.modal.showModal("invModal");
}

var firstTown = {
    //player: '',
   // map: '',
   /* mapBottomLayer: '',*/
    mapStairsLayer: '',
    mapBuildingsLayer: '',
    mapTopLayer: '',
    mapGroundDecorations: '',
    mapTopDecorations: '',
    //artefacts: [],

    //fireButton: '',
    keys: '',
    scrolls: '',
    //speedBoosts: '',

    //speeder1:'',

    invisible: '',

    keyMineCollected: false,
    scrollCollected: false,

    //speedBoosted: false,

    //playerPos: { x: 300, y: 200 },
    pauseButton:'',

    coinsCollected: [],

    preload: function () {
        game.stage.backgroundColor = '#000';
    },

    create: function () {

        game.physics.startSystem(Phaser.Physics.ARCADE);




        this.map = game.add.tilemap('mapFirstTown');
        this.map.addTilesetImage('Town', 'tilesetImg');
        this.map.addTilesetImage('Town additional stuff', 'additionalTiles');

        this.mapBottomLayer = this.map.createLayer('bottom');
        this.mapStairsLayer = this.map.createLayer('stairs');
        this.mapBuildingsLayer = this.map.createLayer('buildings');
        this.mapTopLayer = this.map.createLayer('top');
        this.mapGroundDecorations = this.map.createLayer('ground-decorations');
        this.mapTopDecorations = this.map.createLayer('top-decorations');

        this.mapBottomLayer.resizeWorld();
        this.mapStairsLayer.resizeWorld();
        this.mapBuildingsLayer.resizeWorld();
        this.mapTopLayer.resizeWorld();
        this.mapGroundDecorations.resizeWorld();
        this.mapTopDecorations.resizeWorld();

       // speed = 120;

        if (currentState == 'mineRoom') {
            player.defPosX = 1185;
            player.defPosY = 1030;

        } else if (currentState == 'greenUnderworld') {
            player.defPosX = 480;
            player.defPosY = 490;
        } else if (currentState == 'underworld') {
            player.defPosX = 600;
            player.defPosY = 250;
        }

        player = game.add.sprite(player.defPosX, player.defPosY, 'characterRooms');
       /* player.visible = true;*/

        //300 x 200
        //230 x 600 za kliuch
        //600 x 250 do glavna vrata na glavnata sgrada
        //480 x 490 za vtora sgrada - tazi po sredata
        //1000 x 1000 za nai dolnata kushta i mineRoom
        //za coins: 235 x 550

        player.animations.add('left', [3, 4, 5], 10, true);
        player.animations.add('right', [6, 7, 8], 10, true);
        player.animations.add('up', [9, 10, 11], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        this.pauseButton = this.game.add.sprite(0, 0, 'pauseBtn');
        this.pauseButton.inputEnabled = true;
        this.pauseButton.events.onInputUp.add(function () {
            this.game.paused = true;
        },this);
        this.game.input.onDown.add(function () {
            if(this.game.paused) {
                this.game.paused = false;
            }
        },this);


        game.physics.enable(player, Phaser.Physics.ARCADE);

        game.camera.follow(player);

        coinsText = game.add.text(1200, 45, playerCoins,
            {font: '25px Arial', fill: '#000'});

        cursors = game.input.keyboard.createCursorKeys();

        this.map.setCollisionByExclusion([], true, this.mapBuildingsLayer);
        this.map.setCollisionByExclusion([], true, this.mapTopLayer);
        this.map.setCollisionByExclusion([], true, this.mapGroundDecorations);

        if (setKey) {
            this.keys = game.add.group();
            this.keys.enableBody = true;
            var key = this.keys.create(285, 630, 'key1');
        } else {
            this.keyMineCollected = true;
        }

        if (setScroll) {
            this.scrolls = game.add.group();
            this.scrolls.enableBody = true;
            var scroll = this.scrolls.create(240, 950, 'scroll');
        } else {
            this.scrollCollected = true;
        }

        this.invisible = game.add.group();
        this.invisible.enableBody = true;

        var invis = this.invisible.create(610, 120,'invisible');
        //invis.visible = false;

        var invis2 = this.invisible.create(1185, 980, 'invisible');
        //invis2.visible = false;

        var invis3 = this.invisible.create(480, 440, 'invisible');
        //invis3.visible = false;

        this.speedBoosts = game.add.group();
        this.speedBoosts.enableBody = true;
        var speedBoost1 = this.speedBoosts.create(200, 300, 'speedBoost');
       /* var speedBoost3 = this.speedBoosts.create(600, 290, 'speedBoost');*/
        var speedBoost2 = this.speedBoosts.create(1150, 320, 'speedBoost');

        coins = game.add.group();
        coins.enableBody = true;

        var singleCoin = coins.create(1160, 40, 'coin');

        var invBtn = this.game.add.button(1160, 80, 'invBtn', showModal);

        var coin1 = coins.create(240, 600, 'coin');
        var coin2 = coins.create(240, 640, 'coin');

        var coin3 = coins.create(240, 680, 'coin');
        var coin4 = coins.create(240, 720, 'coin');

        var coin5 = coins.create(470, 530, 'coin');
        var coin6 = coins.create(470, 570, 'coin');

        var coin7 = coins.create(360, 1070, 'coin');
        var coin8 = coins.create(400, 1070, 'coin');

        var coin9 = coins.create(700, 970, 'coin');
        var coin10 = coins.create(780, 970, 'coin');

        var coin11 = coins.create(910, 800, 'coin');
        var coin12 = coins.create(910, 880, 'coin');

        var coin13 = coins.create(400, 300, 'coin');
        var coin14 = coins.create(460, 300, 'coin');
        var coin15 = coins.create(520, 300, 'coin');

        this.coinsCollected.push(coin1, coin2, coin3, coin4, coin5, coin6, coin7, coin8, coin9, coin10, coin11, coin12, coin13, coin14, coin15);

        coins.callAll('animations.add', 'animations', 'spin', [0, 1, 2, 3, 4, 5], 10, true);
        coins.callAll('animations.play', 'animations', 'spin');

    },

    update: function () {

        coinsText.setText(playerCoins);

        game.physics.arcade.collide(player, this.mapBuildingsLayer);
        game.physics.arcade.collide(player, this.mapTopLayer);
        game.physics.arcade.collide(player, this.mapGroundDecorations);

        game.physics.arcade.overlap(player, this.keys, this.collectKeys, null, this);

        game.physics.arcade.overlap(player, this.scrolls, this.collectScrolls, null, this);

        game.physics.arcade.overlap(player, this.invisible.getChildAt(0), this.enterUnderwDoor, null, this);
        game.physics.arcade.overlap(player, this.invisible.getChildAt(1), this.enterMineDoor, null, this);
        game.physics.arcade.overlap(player, this.invisible.getChildAt(2), this.enterGreenUnderwDoor, null, this);

        //game.physics.arcade.overlap(player, this.speedBoosts, this.tookSpeedBoost, null, this);

        game.physics.arcade.overlap(player, coins, takeCoin, null, this);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;

        if (cursors.up.isDown) {
            player.body.velocity.y = -speed;
            player.animations.play('up');
        } else if (cursors.down.isDown) {
            player.body.velocity.y = speed;
            player.animations.play('down');
        } else if (cursors.left.isDown) {
            player.body.velocity.x = -speed;
            player.animations.play('left');
        } else if (cursors.right.isDown){
            player.body.velocity.x = speed;
            player.animations.play('right');
        } else {
            player.animations.stop();
        }

        if (roomsEntered == 3) {
            updateData();
            game.state.start('win');
        }

    },

    collectKeys: function(player, key) {
        setKey = false;
        key.kill();
        this.keyMineCollected = true;
    },

    collectScrolls: function(player, scroll) {
        setScroll = false;
        collectedScrolls++;
        scroll.kill();
        this.scrollCollected = true;
    },

    enterMineDoor: function() {
        if (currentState != 'mineRoom') {
            countAllEnemies = 0;

            currentState = 'mineRoom';
            game.state.start('mineRoom');
        }
    },

    enterGreenUnderwDoor: function() {
        if (currentState != 'greenUnderworld') {
            countAllEnemies = 0;
            currentState = 'greenUnderworld';
            game.state.start('greenUnderworld');
        }
    },

    enterUnderwDoor: function() {
        if (this.keyMineCollected && currentState != 'underworld') {
            countAllEnemies = 0;
            currentState = 'underworld';
            game.state.start('underworld');
        }
    },

    /*tookSpeedBoost: function (player, speedBoost) {
        console.log(speedBoost.body.x);
        this.speeder1 = speedBoost.body.x;
        speedBoost.kill();

        if (speed <= maxSpeed - 20) {
            speed += 30;
        }
        this.speedBoosted++;
    },*/

    processHandler: function (player, veg) {
        return true;
    }
};

function takeCoin(player, coin) {
    coin.body = null;
    coin.destroy();
    playerCoins += 10;
}

