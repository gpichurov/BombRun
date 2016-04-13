
room = 'underworld';

var underworld = {
    mapUpLayer: '',
    identificator: 0,
    droppingBomb: false,
    killEnemy1: false,
    smallMaps:'',
    invisible: '',
    invis:'',
    room: 'underworld',
    scrolls: '',
    eKey:'',
    sKey:'',

    counterEnemy: 0,

    preload: function () {
        game.stage.backgroundColor = 'rgb(236, 210, 116)';
    },

    create: function () {
        this.eKey = game.input.keyboard.addKey(Phaser.Keyboard.E);

        this.sKey = game.input.keyboard.addKey(Phaser.Keyboard.S);

        this.map = game.add.tilemap('mapUnderworld');

        this.map.addTilesetImage('rpgtileset', 'rpgtileset');

        this.mapBottomLayer = this.map.createLayer('bottom');
        this.mapWallsLayer = this.map.createLayer('walls');
        this.mapUpLayer = this.map.createLayer('up');

        this.mapBottomLayer.resizeWorld();
        this.mapWallsLayer.resizeWorld();
        this.mapUpLayer.resizeWorld();

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

        player = game.add.sprite(78, 560, 'characterRooms');

        player.animations.add('left', [3, 4, 5], 10, true);
        player.animations.add('right', [6, 7, 8], 10, true);
        player.animations.add('up', [9, 10, 11], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        this.invisible = game.add.group();
        this.invisible.enableBody = true;
        this.invis = this.invisible.create(78, 610, 'invisible');

        this.scrolls = game.add.group();
        this.scrolls.enableBody = true;
        var scroll = this.scrolls.create(240, 240, 'paper');

        this.enemy1 = new Enemy(game, 32, 32, 'characterEnemy', 'switchSquare', 120, 539, +1, 'x', '');
        game.add.existing(this.enemy1);

        this.enemy2 = new Enemy(game, 320, 32, 'characterEnemy', 'switch', 120, 539, +1, 'y', '');
        game.add.existing(this.enemy2);

        this.enemy3 = new Enemy(game, 32, 223, 'characterEnemy', 'switch', 120, 544, +1, 'x', '');
        game.add.existing(this.enemy3);

        this.enemy4 = new Enemy(game, 32, 415, 'characterEnemy', 'switch', 120, 544, +1, 'x', '');
        game.add.existing(this.enemy4);

        this.smallMaps = game.add.group();
        this.smallMaps.enableBody = true;

        bombs = game.add.group();
        bombs.enableBody = true;

        coins = game.add.group();
        coins.enableBody = true;

        inventory();

        game.physics.enable(player, Phaser.Physics.ARCADE);

        game.camera.follow(player);

        cursors = game.input.keyboard.createCursorKeys();
        this.bombButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);

        this.map.setCollisionByExclusion([], true, this.mapWallsLayer);
        this.map.setCollisionByExclusion([], true, this.mapUpLayer);
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
        game.physics.arcade.collide(player, this.mapUpLayer);

        game.physics.arcade.overlap(player, this.scrolls, this.collectScroll, null, this);

        game.physics.arcade.overlap(player, this.invisible, openDoor, null, this);

        game.physics.arcade.overlap(player, coins, takeCoin, null, this);

        coinsText.setText(playerCoins);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;

        if (game.physics.arcade.overlap(player, this.smallMaps, this.collectScroll, this))
        {
            this.smallMaps.kill();
        }

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