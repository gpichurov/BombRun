/**
 * Created by maya on 26-Mar-16.
 */


var loadState = {
    preload: function () {
       /* game.load.image('preloadBar', 'assets/.png');*/

        var loadingLabel = game.add.text(80, 150, 'Loading...',
            {font: '30px Courier', fill: '#ffffff'});


        game.load.image('pauseBtn', 'assets/pauseBtn.png');


        //game.load.image('background', 'assets/background.jpg');


        // from startScreen

        game.load.image('buttonPlay', 'assets/play_button.png');

        game.load.image('logo', 'assets/bomb-run.png');


        // from firstTown

        game.load.tilemap('mapFirstTown', 'assets/town-map.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('tilesetImg', 'assets/magecity.png');
        game.load.image('additionalTiles', 'assets/magecity1.png');

        game.load.spritesheet('character', 'assets/chars2.png', 48, 48, 36);

        //game.load.image('darkMonster', 'assets/darkMonster.png');
        //game.load.spritesheet('enemy', 'assets/EnemySpriteSheet2.png', 30, 30);

        game.load.image('key1', 'assets/key1.png');
        game.load.image('scroll', 'assets/scroll.png');

        game.load.image('invisible', 'assets/key1.png');

        game.load.image('speedBoost', 'assets/elixir.png');

    /*    game.load.spritesheet('coin', 'assets/coin.png', 32, 32);*/

        game.load.image('singleCoin', 'assets/singleCoin.png');




        // from mineRoom

        game.stage.backgroundColor = '#000';

        game.load.tilemap('mapMine', 'assets/mine2.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('tilea4', 'assets/tilea4.png');
        game.load.image('mine-floor', 'assets/mine-floor.png');

        game.load.spritesheet('characterRooms', 'assets/organi11.png', 32, 32, 12);

        game.load.image('backBtn', 'assets/go-back-button.png');

        game.load.spritesheet('bomb', 'assets/BombExploding.png', 32, 64, 13);

        //game.load.spritesheet('enemy', 'assets/EnemySpriteSheet2.png', 30, 30);

        game.load.spritesheet('characterEnemy', 'assets/organi11.png', 32, 32, 12);

        game.load.image('scroll2', 'assets/scroll2.png');

        // from underworld

        /*game.stage.backgroundColor = '#000';*/

        game.load.tilemap('mapUnderworld', 'assets/underworld.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('rpgtileset', 'assets/rpgtileset.png');

        game.load.spritesheet('coin', 'assets/coin.png', 32, 32);

      /*  game.load.spritesheet('character', 'assets/organi11.png', 32, 32, 12);*/

     /*   game.load.image('button', 'assets/go-back-button.png');*/

   /*     game.load.spritesheet('bomb', 'assets/BombExploding.png', 32, 64, 13);*/

        //game.load.spritesheet('enemy', 'assets/EnemySpriteSheet2.png', 30, 30);

      /*  game.load.spritesheet('characterEnemy', 'assets/organi11.png', 32, 32, 12);*/

        game.load.image('smallMap', 'assets/smallMap.png');


        // from greenUnderworld

        game.load.image('paper', 'assets/paper.png');

        game.load.tilemap('mapGreenUnderw', 'assets/greenUnderworld.json', null, Phaser.Tilemap.TILED_JSON);
/*
        game.load.image('tilea4', 'assets/tilea4.png');*/
        game.load.image('tilea5', 'assets/tilea5.png');
/*
        game.load.spritesheet('coin', 'assets/coin.png', 32, 32);*/
/*
        game.load.spritesheet('characterRooms', 'assets/organi11.png', 32, 32, 12);*/
/*
        game.load.image('button', 'assets/go-back-button.png');*/
/*
        game.load.spritesheet('bomb', 'assets/BombExploding.png', 32, 64, 13);*/
        /*
         game.load.spritesheet('enemy', 'assets/EnemySpriteSheet2.png', 30, 30);*/

        /*game.load.spritesheet('characterEnemy', 'assets/organi11.png', 32, 32, 12);*/
        /*
         game.load.image('smallMap', 'assets/smallMap.png');*/
/*
        game.load.spritesheet('coin', 'assets/coin.png', 32, 32);*/


    },
    
    create: function () {
        //game.state.start('menu');
       // this.background = this.add.tileSprite(0,0, this.world.width, this.world.height, 'background');



        game.state.start('startScreen');


    }
};