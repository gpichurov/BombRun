
var bombs;


var mineRoom = {
    map: '',
    mapBottomLayer: '',
    mapWallsLayer: '',
    mapCubesLayer: '',
    droppingBomb: false,
    bombButton: '',

    bomb1: '',

    enemy1:'',
    enemy2:'',

    killEnemy1: false,

    bombLabel: '',
    energyLabel: '',

    scroll2:'',

    create: function () {
        var button = game.add.button(game.width - 200, 20, 'backBtn', this.back);
        //680 x 20

        this.energyLabel = game.add.text(game.width - 200, 160, 'Energy: ' + energy,
            {font: '25px Arial', fill: '#fff'});

        this.bombLabel = game.add.text(game.width - 200, 230, 'Bombs: ' + maxBombs,
            {font: '25px Arial', fill: '#fff'});

        this.map = game.add.tilemap('mapMine');

        this.map.addTilesetImage('tilea4', 'tilea4');
        this.map.addTilesetImage('mine-floor', 'mine-floor');

        this.mapBottomLayer = this.map.createLayer('bottom');
        this.mapWallsLayer = this.map.createLayer('walls');

        this.mapBottomLayer.resizeWorld();
        this.mapWallsLayer.resizeWorld();

        player = game.add.sprite(285, 185, 'characterRooms');

        player.animations.add('left', [3, 4, 5], 10, true);
        player.animations.add('right', [6, 7, 8], 10, true);
        player.animations.add('up', [9, 10, 11], 10, true);
        player.animations.add('down', [0, 1, 2], 10, true);

        this.scroll2 = game.add.group();
        this.scroll2.enableBody = true;

        bombs = game.add.group();
        bombs.enableBody = true;

        this.enemy1 = new Enemy(game, 32, 32, 'characterEnemy', 120, 544, +1, 'x', '');
        game.add.existing(this.enemy1);

        this.enemy2 = new Enemy(game, 32, 32, 'characterEnemy', 140, 544, +1, 'x', '');
        game.add.existing(this.enemy2);

        game.physics.enable(player, Phaser.Physics.ARCADE);
        game.camera.follow(player);

        cursors = game.input.keyboard.createCursorKeys();
        this.bombButton = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);

        this.map.setCollisionByExclusion([], true, this.mapWallsLayer);
    },

    update: function () {
        game.physics.arcade.collide(player, this.mapWallsLayer);

        game.physics.arcade.overlap(player, this.scroll2, this.collectScroll, null, this);

        player.body.velocity.x = 0;
        player.body.velocity.y = 0;

        if (cursors.up.isDown && energy>0) {
            distancePassed++;
            player.body.velocity.y = -200;
            player.animations.play('up');

        } else if (cursors.down.isDown && energy>0) {
            distancePassed++;
            player.body.velocity.y = 200;
            player.animations.play('down');

        } else if (cursors.left.isDown && energy>0 ) {
            distancePassed++;
            player.body.velocity.x = -200;
            player.animations.play('left');

        } else if (cursors.right.isDown && energy>0){
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
            this.bomb1 = bombs.create(player.body.x, player.body.y-32, 'bomb');
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

    back: function() {
        game.state.start('firstTown');
        console.log('got back');
    },

    processHandler: function (player, veg) {
        return true;
    },

    collisionHandler: function(player, veg) {
        return true;
    },

    collectScroll: function (player, scroll) {
        scroll.kill();
    },

}
