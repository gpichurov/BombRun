/**
 * Created by maya on 09-Apr-16.
 */

room = 'greenUnderworld';

var greenUnderworld = {
   /* map: '',*/
    /*mapBottomLayer: '',
    mapWallsLayer: '',*/
    identificator: 0,
    droppingBomb: false,
    /*bomb1: '',


    bombButton: '',

    enemy1:'',
    enemy2:'',*/
    invisible: '',
    killEnemy1: false,

    /*bombLabel: '',
    energyLabel: '',*/

    smallMaps: '',
    counterEnemy: 0,
    room: 'greenUnderworld',
    invis:'',
    scrolls: '',

   /* scroll:'',*/

    create: function () {
        var button = game.add.button(game.width - 200, 20, 'backBtn', this.back);
        //680 x 20

        this.energyLabel = game.add.text(game.width - 200, 160, 'Energy: ' + energy,
            {font: '25px Arial', fill: '#fff'});

        this.bombLabel = game.add.text(game.width - 200, 230, 'Bombs: ' + maxBombs,
            {font: '25px Arial', fill: '#fff'});

        coinsText = game.add.text(game.width - 200, 300, 'Coins: ' + playerCoins,
            {font: '25px Arial', fill: '#fff'});

        this.map = game.add.tilemap('mapGreenUnderw');

        this.map.addTilesetImage('tilea4', 'tilea4');
        this.map.addTilesetImage('tilea5', 'tilea5');

        this.mapBottomLayer = this.map.createLayer('bottom');
        this.mapWallsLayer = this.map.createLayer('walls');

        this.mapBottomLayer.resizeWorld();
        this.mapWallsLayer.resizeWorld();

        player = game.add.sprite(32, 32, 'characterRooms');

        player.animations.add('left', [3, 4, 5], 10, true);
        player.animations.add('right', [6, 7, 8], 10, true);
        player.animations.add('up', [9, 10, 11], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        this.invisible = game.add.group();
        this.invisible.enableBody = true;
        this.invis = this.invisible.create(0, 330, 'invisible');
        //invis.visible = false;

        this.scrolls = game.add.group();
        this.scrolls.enableBody = true;
        var scroll = this.scrolls.create(260, 280, 'scroll2');

        this.enemy1 = new Enemy(game, 64, 256, 'characterEnemy', 'switchSquare', 100, 96, +1, 'x', '');
        game.add.existing(this.enemy1);

        this.enemy2 = new Enemy(game, 256, 256, 'characterEnemy', 'switchSquare', 100, 95, +1, 'x', '');
        game.add.existing(this.enemy2);

        this.enemy3 = new Enemy(game, 448, 256, 'characterEnemy', 'switchSquare', 100, 96, +1, 'x', '');
        game.add.existing(this.enemy3);

        this.enemy4 = new Enemy(game, 544, 544, 'characterEnemy', 'switchSquare', 100, 480, -1, 'x', '');
        game.add.existing(this.enemy4);

        this.smallMaps = game.add.group();
        this.smallMaps.enableBody = true;

        bombs = game.add.group();
        bombs.enableBody = true;

        coins = game.add.group();
        coins.enableBody = true;

       /* coins.callAll('animations.add', 'animations', 'spin', [0, 1, 2, 3, 4, 5], 10, true);*/

        game.physics.enable(player, Phaser.Physics.ARCADE);

        game.camera.follow(player);

        cursors = game.input.keyboard.createCursorKeys();
        this.bombButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);

        this.map.setCollisionByExclusion([], true, this.mapWallsLayer);
    },

    update: function () {
        game.physics.arcade.collide(player, this.mapWallsLayer);

        game.physics.arcade.overlap(player, this.scrolls, this.collectScroll, null, this);

        game.physics.arcade.overlap(player, this.invisible, openDoor, null, this);

        game.physics.arcade.overlap(player, coins, takeCoin, null, this);

        coinsText.setText('Coins: ' + playerCoins);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;
/*
        if (game.physics.arcade.overlap(player, this.scrolls, this.collectScroll, this))
        {
            this.scrolls.kill();
        }*/

        if (cursors.up.isDown && energy > 0) {
            distancePassed++;
            player.body.velocity.y = -200;
            player.animations.play('up');

        } else if (cursors.down.isDown && energy > 0) {
            distancePassed++;
            player.body.velocity.y = 200;
            player.animations.play('down');

        } else if (cursors.left.isDown && energy > 0) {
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
                /*  this.bomb = game.add.sprite(player.body.x, player.body.y-32, 'bomb');*/
                //this.bomb = game.add.sprite(player.body.x, player.body.y, 'bomb');
                var anim = this.bomb1.animations.add('explode', [0, 1, 2, 3, 4, 5, 6, 7, 8], 30, true);

                maxBombs -= 1;
                this.bombLabel.setText('Bombs: ' + maxBombs);

                anim.onStart.add(this.animationStarted, this);
                anim.onLoop.add(this.animationLooped, this);
                anim.onComplete.add(this.animationStopped, this);

                anim.play(10, false);

                this.dropping_bomb = true;

                console.log(anim);
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
/*
    collisionHandler: function(player, veg) {

        return true;

    },*/

    collectScroll: function (player, scroll) {
        collectedScrolls++;
        scroll.kill();
    }

  /*  enterFirstWorld: function () {
        if (killedEnemiesGreenUnderw) {
            game.state.start('firstTown');
        }
    }*/
};

/*function collisionPlayerEnemy(player, enemy) {
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
            greenUnderworld.counterEnemy++;
            console.log(greenUnderworld.counterEnemy);
            if (greenUnderworld.counterEnemy == 4) {
                killedEnemiesGreenUnderw = true;
                console.log('4 enemies: ' + greenUnderworld.counterEnemy);
            }
            greenUnderworld.identificator++;
            releasedObjects(greenUnderworld.identificator);
            /!*var singleScroll2 = underworld.smallMaps.create(currentEnemyX, currentEnemyY, 'smallMap');*!/
        }//coin.kill();

    } else {
        // coin.kill();
        // currentEnemy.kill();
        //this.killEnemy1 = true;

    }
}*/



function releasedObjects(identificator) {
    /* room = this;*/
    for (var i = 1; i <= identificator; i++) {
        /*if (identificator == 1) {
            var singleScroll2 = greenUnderworld.smallMaps.create(currentEnemyX, currentEnemyY, 'paper');
        } else if (identificator >= 2) {
            var coin1 = coins.create(currentEnemyX, currentEnemyY, 'coin');
        }*/
    }
}

