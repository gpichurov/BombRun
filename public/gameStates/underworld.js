
room = 'underworld';

var underworld = {
/*    map: '',*/
    /*mapBottomLayer: '',
    mapWallsLayer: '',*/
    mapUpLayer: '',
    identificator: 0,
    /*bomb1: '',*/
    droppingBomb: false,
    /*bombButton: '',

    enemy1:'',
    enemy2:'',*/

    killEnemy1: false,

    /*bombLabel: '',
    energyLabel: '',*/

    smallMaps:'',
    invisible: '',
    invis:'',
    room: 'underworld',
    scrolls: '',

    counterEnemy: 0,

    preload: function () {
        game.stage.backgroundColor = 'rgb(236, 210, 116)';
    },

    create: function () {
        var button = game.add.button(game.width - 200, 20, 'backBtn', this.back);
        //680 x 20

        this.energyLabel = game.add.text(game.width - 200, 160, 'Energy: ' + energy,
            {font: '25px Arial', fill: '#fff'});

        this.bombLabel = game.add.text(game.width - 200, 230, 'Bombs: ' + maxBombs,
            {font: '25px Arial', fill: '#fff'});

        coinsText = game.add.text(game.width - 200, 300, 'Coins: ' + playerCoins,
            {font: '25px Arial', fill: '#fff'});


        this.map = game.add.tilemap('mapUnderworld');

        this.map.addTilesetImage('rpgtileset', 'rpgtileset');

        this.mapBottomLayer = this.map.createLayer('bottom');
        this.mapWallsLayer = this.map.createLayer('walls');
        this.mapUpLayer = this.map.createLayer('up');

        this.mapBottomLayer.resizeWorld();
        this.mapWallsLayer.resizeWorld();
        this.mapUpLayer.resizeWorld();

        player = game.add.sprite(78, 560, 'characterRooms');

        player.animations.add('left', [3, 4, 5], 10, true);
        player.animations.add('right', [6, 7, 8], 10, true);
        player.animations.add('up', [9, 10, 11], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        this.invisible = game.add.group();
        this.invisible.enableBody = true;
        //this.invisible.scale.setTo(2, 2);
        this.invis = this.invisible.create(78, 610, 'invisible');
        //invis.visible = false;

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
/*
        coins.callAll('animations.add', 'animations', 'spin', [0, 1, 2, 3, 4, 5], 10, true);*/

        game.physics.enable(player, Phaser.Physics.ARCADE);

        game.camera.follow(player);

        cursors = game.input.keyboard.createCursorKeys();
        this.bombButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);

        this.map.setCollisionByExclusion([], true, this.mapWallsLayer);
        this.map.setCollisionByExclusion([], true, this.mapUpLayer);
    },

    update: function () {
        game.physics.arcade.collide(player, this.mapWallsLayer);
        game.physics.arcade.collide(player, this.mapUpLayer);

        game.physics.arcade.overlap(player, this.scrolls, this.collectScroll, null, this);

        game.physics.arcade.overlap(player, this.invisible, openDoor, null, this);

        game.physics.arcade.overlap(player, coins, takeCoin, null, this);

        coinsText.setText('Coins: ' + playerCoins);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;

        if (game.physics.arcade.overlap(player, this.smallMaps, this.collectScroll, this))
        {
            this.smallMaps.kill();
        }

        if (cursors.up.isDown && energy > 0) {
            distancePassed++;
            player.body.velocity.y = -200;
            player.animations.play('up');

        } else if (cursors.down.isDown && energy > 0) {
            distancePassed++;
            player.body.velocity.y = 200;
            player.animations.play('down');

        } else if (cursors.left.isDown && energy > 0 ) {
            distancePassed++;
            player.body.velocity.x = -200;
            player.animations.play('left');

        } else if (cursors.right.isDown && energy > 0){
            distancePassed++;
            player.body.velocity.x = 200;
            player.animations.play('right');

        } else {
            player.animations.stop();
        }

        if (distancePassed > 100){
            distancePassed = 0;
            if (energy > 0) {
                this.energyLabel.setText("Energy: "+ (--energy));
            } else {
                player.animations.stop();
            }
        }

        if (this.bombButton.isDown && !this.dropping_bomb) {
            if(maxBombs > 0){
                this.bomb1 = bombs.create(player.body.x, player.body.y - 32, 'bomb');
                var anim = this.bomb1.animations.add('explode', [0, 1, 2, 3, 4, 5, 6, 7, 8], 30, true);

                maxBombs -= 1;
                this.bombLabel.setText('Bombs: ' + maxBombs);

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
        /*anim.play(10, false);*/
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

    render: function () {

    },

    functionToCall: function () {
        //bomb.animations.stop();
    },

    back: function() {
        game.state.start('firstTown');
        console.log('got back');
    },

    processHandler: function (player, veg) {

        return true;

    },

    collisionHandler: function(player, veg) {
        /*
         if (veg.frame == 17)
         {
         veg.kill();
         }*/

        return true;

    },

    collectScroll: function (player, scroll) {
        collectedScrolls++;
        scroll.kill();
    }

    /*enterFirstWorld: function () {
        if (killedEnemiesUnderw) {
            game.state.start('firstTown');
        }
    }*/

};
/*
function collisionPlayerEnemy(player, enemy) {
    enemy.body.immovable = true;
    player.kill();
}*/

/*function killEnemy(currentEnemy, explodingBomb) {
    var a = explodingBomb.animations.currentFrame.index;
    if (a == 8) {
        currentEnemy.scale.setTo(1,1);
        currentEnemyX = currentEnemy.body.x;
        currentEnemyY = currentEnemy.body.y;
        bombX = explodingBomb.body.x;
        bombY = explodingBomb.body.y;
        if (currentEnemyX - bombX <= 50 && currentEnemyY - bombY <= 50 && currentEnemyX - bombX >= 0 && currentEnemyY - bombY >= 0 ){
            currentEnemy.kill();
            console.log(underworld.counterEnemy);
            underworld.counterEnemy++;
            console.log(underworld.counterEnemy);
            if (underworld.counterEnemy == 4) {
                console.log('4 enemies: ' + underworld.counterEnemy);
                killedEnemiesUnderw = true;
            }
            underworld.identificator++;
            releasedObjects(underworld.identificator);
            /!*var singleScroll2 = underworld.smallMaps.create(currentEnemyX, currentEnemyY, 'smallMap');*!/
        }
        //coin.kill();

    } else {
        // coin.kill();
        // currentEnemy.kill();
        //this.killEnemy1 = true;
    }
}*/



function releasedObjects(identificator) {
    /* room = this;*/
    for (var i = 1; i <= identificator; i++) {
        if (identificator == 1) {
            var singleScroll2 = underworld.smallMaps.create(currentEnemyX, currentEnemyY, 'smallMap');
        } else if (identificator >= 2) {
            var coin1 = coins.create(currentEnemyX, currentEnemyY, 'coin');
        }
    }
}