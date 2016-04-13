
var mineRoom = {
    identificator: 0,
    mapCubesLayer: '',
    droppingBomb: false,
    invisible:'',
    killEnemy1: false,
    room: 'mineRoom',
    smallMaps: '',
    counterEnemy: 0,
    invis:'',
    scrolls: '',
    eKey:'',
    sKey:'',

    preload: function () {
        game.stage.backgroundColor = 'rgb(104, 81, 53)';
    },

    create: function () {
        this.eKey = game.input.keyboard.addKey(Phaser.Keyboard.E);

        this.sKey = game.input.keyboard.addKey(Phaser.Keyboard.S);

        this.map = game.add.tilemap('mapMine');

        this.map.addTilesetImage('tilea4', 'tilea4');
        this.map.addTilesetImage('mine-floor', 'mine-floor');

        this.mapBottomLayer = this.map.createLayer('bottom');
        this.mapWallsLayer = this.map.createLayer('walls');

        this.mapBottomLayer.resizeWorld();
        this.mapWallsLayer.resizeWorld();

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

        player = game.add.sprite(285, 185, 'characterRooms');

        player.animations.add('left', [12, 13, 14], 10, true);
        player.animations.add('right', [24, 25, 26], 10, true);
        player.animations.add('up', [36, 37, 38], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        this.smallMaps = game.add.group();
        this.smallMaps.enableBody = true;

        bombs = game.add.group();
        bombs.enableBody = true;

        coins = game.add.group();
        coins.enableBody = true;

        inventory();

        this.invisible = game.add.group();
        this.invisible.enableBody = true;
        this.invis = this.invisible.create(605, 150, 'invisible');

        this.scrolls = game.add.group();
        this.scrolls.enableBody = true;
        var scroll = this.scrolls.create(240, 290, 'smallMap');

        this.enemy1 = new Enemy(game, 32, 32, 'characterEnemy', 'switch', 120, 544, +1, 'y', '');
        game.add.existing(this.enemy1);

        this.enemy2 = new Enemy(game, 576, 576, 'characterEnemy', 'switch', 120, 544, -1, 'y', '');
        game.add.existing(this.enemy2);

        this.enemy3 = new Enemy(game, 576, 32, 'characterEnemy', 'switch', 120, 544, -1, 'x', '');
        game.add.existing(this.enemy3);

        this.enemy4 = new Enemy(game, 32, 576, 'characterEnemy', 'switch', 120, 544, +1, 'x', '');
        game.add.existing(this.enemy4);

        game.physics.enable(player, Phaser.Physics.ARCADE);
        game.camera.follow(player);

        cursors = game.input.keyboard.createCursorKeys();
        this.bombButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);

        this.map.setCollisionByExclusion([], true, this.mapWallsLayer);
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

        game.physics.arcade.collide(player, this.mapWallsLayer);

        game.physics.arcade.overlap(player, this.scrolls, this.collectScroll, null, this);

        game.physics.arcade.overlap(player, this.invisible, openDoor, null, this);

        game.physics.arcade.overlap(player, coins, takeCoin, null, this);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;

        if (cursors.up.isDown && energy > 0) {
            distancePassed++;
            player.body.velocity.y = -speed;
            player.animations.play('up');

        } else if (cursors.down.isDown && energy > 0) {
            distancePassed++;
            player.body.velocity.y = speed;
            player.animations.play('down');

        } else if (cursors.left.isDown && energy > 0 ) {
            distancePassed++;
            player.body.velocity.x = -speed;
            player.animations.play('left');

        } else if (cursors.right.isDown && energy > 0){
            distancePassed++;
            player.body.velocity.x = speed;
            player.animations.play('right');

        } else {
            player.animations.stop();
        }

        if (distancePassed > 100){
            distancePassed = 0;
            if (energy > 0) {
                energyLabel.setText(--energy);
            } else {
                player.animations.stop();
            }
        }

        if (this.bombButton.isDown && !this.dropping_bomb) {
            if(maxBombs > 0){
            this.bomb1 = bombs.create(player.body.x, player.body.y - 32, 'bomb');
            var anim = this.bomb1.animations.add('explode', [0, 1, 2, 3, 4, 5, 6, 7, 8], 30, true);

            maxBombs -= 1;
            bombLabel.setText(maxBombs);

            anim.onStart.add(this.animationStarted, this);
            anim.onLoop.add(this.animationLooped, this);
            anim.onComplete.add(this.animationStopped, this);

            anim.play(10, false);

            this.dropping_bomb = true;
            }
        }

        if (!this.bombButton.isDown && this.dropping_bomb) {
            this.dropping_bomb = false;
        }
    },

    animationStarted: function () {
        return true;
    },

    animationLooped: function(sprite, animation) {
        animation.loop = false;
        if (animation.loopCount === 2)
        {
            animation.loop = false;
        }
        else
        {
            animation.loop = false;
        }
    },

    animationStopped: function(sprite, animation) {
        sprite.kill();
    },

    processHandler: function (player, veg) {
        return true;
    },

    collectScroll: function (player, scroll) {
        collectedScrolls++;
        scroll.kill();
    }

};

function inventory() {
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

    var singleCoin = coins.create(1125, 40, 'coin');
    singleCoin.fixedToCamera = true;
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
}
