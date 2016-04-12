/**
 * Created by maya on 03-Apr-16.
 */


var firstTown = {
    mapStairsLayer: '',
    mapBuildingsLayer: '',
    mapTopLayer: '',
    mapGroundDecorations: '',
    mapTopDecorations: '',
    keys: '',
    scrolls: '',
    invisible: '',
    invBox: '',
    keyMineCollected: false,
    scrollCollected: false,

    items: '',
    emptySprite: '',
    eKey: '',
    sKey: '',

    coinsCollected: [],

    preload: function () {
        game.stage.backgroundColor = '#000';
    },

    create: function () {

        this.eKey = game.input.keyboard.addKey(Phaser.Keyboard.E);

        this.sKey = game.input.keyboard.addKey(Phaser.Keyboard.S);

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

        player.animations.add('left', [3, 4, 5], 10, true);
        player.animations.add('right', [6, 7, 8], 10, true);
        player.animations.add('up', [9, 10, 11], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        pauseButton = this.game.add.sprite(0, 0, 'pauseBtn');
        pauseButton.fixedToCamera = true;
        pauseButton.inputEnabled = true;
        pauseButton.events.onInputUp.add(function () {
            this.game.paused = true;
        },this);
        this.game.input.onDown.add(function () {
            if(this.game.paused) {
                this.game.paused = false;
            }
        },this);

        game.physics.enable(player, Phaser.Physics.ARCADE);

        game.camera.follow(player);

        invBox = game.add.sprite(1120, 30, 'brownWindow');
        invBox.fixedToCamera = true;
        invBox.alpha = 0.5;

        items = game.add.group();
        items.enableBody = true;

        coinsText = game.add.text(1165, 45, playerCoins,
            {font: '25px Arial', fill: '#000'});

        energyPotionLabel = game.add.text(1250, 45, energyPotion,
            {font: '25px Arial', fill: '#000'});

        bombLabel = game.add.text(1165, 100, maxBombs,
            {font: '25px Arial', fill: '#000'});

        speedPotionLabel = game.add.text(1250, 100, speedPotions,
            {font: '25px Arial', fill: '#000'});

        scrollsLabel = game.add.text(1165, 145, collectedScrolls,
            {font: '25px Arial', fill: '#000'});

        energyLabel = game.add.text(1250, 145, energy,
            {font: '25px Arial', fill: '#000'});

        speedLabel = game.add.text(1122, 185, 'Speed: ' + speed + '/260',
            {font: '25px Arial', fill: '#000'});


        var energyPotionItem = items.create(1210, 35, 'potion');
        energyPotionItem.fixedToCamera = true;
        var bombItem = items.create(1125, 95, 'bombCool');
        bombItem.fixedToCamera = true;
        var speedItem = items.create(1210, 95, 'potion2');
        speedItem.fixedToCamera = true;
        var scrollItem = items.create(1125, 145, 'scroll');
        scrollItem.fixedToCamera = true;
        var energyItem = items.create(1210, 145, 'energy');
        energyItem.fixedToCamera = true;

        coinsText.fixedToCamera = true;
        energyLabel.fixedToCamera = true;
        bombLabel.fixedToCamera = true;
        speedPotionLabel.fixedToCamera = true;
        scrollsLabel.fixedToCamera = true;
        energyPotionLabel.fixedToCamera = true;
        speedLabel.fixedToCamera = true;

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

        coins = game.add.group();
        coins.enableBody = true;

        var singleCoin = coins.create(1125, 40, 'coin');
        singleCoin.fixedToCamera = true;

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

        //this.coinsCollected.push(coin1, coin2, coin3, coin4, coin5, coin6, coin7, coin8, coin9, coin10, coin11, coin12, coin13, coin14, coin15);

        coins.callAll('animations.add', 'animations', 'spin', [0, 1, 2, 3, 4, 5], 10, true);
        coins.callAll('animations.play', 'animations', 'spin');

    },

    update: function () {

        this.eKey.onDown.addOnce(takeEnergy, this);
        this.sKey.onDown.addOnce(takeSpeed, this);

        coinsText.setText(playerCoins);
        energyPotionLabel.setText(energyPotion);
        bombLabel.setText(maxBombs);
        scrollsLabel.setText(collectedScrolls);
        speedPotionLabel.setText(speedPotions);
        energyLabel.setText(energy);
        speedLabel.setText('Speed: ' + speed + '/260');

        game.physics.arcade.collide(player, this.mapBuildingsLayer);
        game.physics.arcade.collide(player, this.mapTopLayer);
        game.physics.arcade.collide(player, this.mapGroundDecorations);

        game.physics.arcade.overlap(player, this.keys, this.collectKeys, null, this);

        game.physics.arcade.overlap(player, this.scrolls, this.collectScrolls, null, this);

        game.physics.arcade.overlap(player, this.invisible.getChildAt(0), this.enterUnderwDoor, null, this);
        game.physics.arcade.overlap(player, this.invisible.getChildAt(1), this.enterMineDoor, null, this);
        game.physics.arcade.overlap(player, this.invisible.getChildAt(2), this.enterGreenUnderwDoor, null, this);

        game.physics.arcade.overlap(player, coins, takeCoin, null, this);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;

        if (cursors.up.isDown) {
            player.body.velocity.y = -speed;
            player.animations.play('up');
            distancePassed++;
        } else if (cursors.down.isDown) {
            player.body.velocity.y = speed;
            player.animations.play('down');
            distancePassed++;
        } else if (cursors.left.isDown) {
            player.body.velocity.x = -speed;
            player.animations.play('left');
            distancePassed++;
        } else if (cursors.right.isDown){
            player.body.velocity.x = speed;
            player.animations.play('right');
            distancePassed++;
        } else {
            player.animations.stop();
        }

        if (roomsEntered == 3) {
            updateData();
            game.state.start('win');
        }

        if (distancePassed > 100){
            distancePassed = 0;
            if (energy > 0) {
                energyLabel.setText(--energy);
            } else {
                player.animations.stop();
            }
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
            //countAllEnemies = 0;

            currentState = 'mineRoom';
            game.state.start('mineRoom');
        }
    },

    enterGreenUnderwDoor: function() {
        if (currentState != 'greenUnderworld') {
            //countAllEnemies = 0;
            currentState = 'greenUnderworld';
            game.state.start('greenUnderworld');
        }
    },

    enterUnderwDoor: function() {
        if (this.keyMineCollected && currentState != 'underworld') {
            //countAllEnemies = 0;
            currentState = 'underworld';
            game.state.start('underworld');
        }
    },

    processHandler: function (player, veg) {
        return true;
    }
};

function takeCoin(player, coin) {
    coin.body = null;
    coin.destroy();
    playerCoins += 10;
    coinsText.setText(playerCoins);
}

function takeEnergy() {
    if (energyPotion > 0) {
        energyPotion--;
        energy += 10;
    }

    energyPotionLabel.setText(energyPotion);
    energyLabel.setText(energy);
}

function takeSpeed() {
    if (speed == 240) {
        speed = 260;
        speedPotions--;
    } else if (speed > 240) {
        speed = 260;
    } else if (speed < 240) {
        speed += 20;
        speedPotions--;
    }
    speedPotionLabel.setText(speedPotions);
    speedLabel.setText('Speed: ' + speed + '/260');
}
