/**
 * Created by maya on 26-Mar-16.
 */


var loadState = {
    preload: function () {

        var loadingLabel = game.add.text(80, 150, 'Loading...',
            {font: '30px Courier', fill: '#ffffff'});

        game.load.image('win', 'assets/smile.png');

        game.load.image('gameover', 'assets/sad.png');

        game.load.image('pauseBtn', 'assets/pauseBtn.png');

        // from startScreen

        game.load.image('buttonPlay', 'assets/btnPlay.png');
        game.load.image('buttonControls', 'assets/btnControls.png');

        game.load.image('bck', 'assets/bck.png');
        game.load.image('closeBtn', 'assets/closeBtn.png');
        game.load.image('arrowKeys', 'assets/arrowKeys.png');
        game.load.image('space', 'assets/SPACE2.png');
        game.load.image('sKey', 'assets/sKey.png');
        game.load.image('eKey', 'assets/eKey.png');

        game.load.image('logo', 'assets/bomb-run.png');

        game.load.image('controls', 'assets/controls.png');

        // from firstTown

        game.load.tilemap('mapFirstTown', 'assets/town-map.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('tilesetImg', 'assets/magecity.png');

        game.load.image('additionalTiles', 'assets/magecity1.png');

        game.load.spritesheet('character', 'assets/chars2.png', 48, 48, 36);

        game.load.image('key1', 'assets/key1.png');

        game.load.image('scroll', 'assets/scroll.png');

        game.load.image('invisible', 'assets/key1.png');

        game.load.image('speedBoost', 'assets/elixir.png');

        game.load.image('singleCoin', 'assets/singleCoin.png');

        game.load.image('brownWindow', 'assets/brownWindow.jpeg');

        game.load.image('bombCool', 'assets/bombCool.png');

        game.load.image('potion', 'assets/potion.png');

        game.load.image('energy', 'assets/energy.png');

        game.load.image('potion2', 'assets/potion2.png');

        // from mineRoom

        game.stage.backgroundColor = '#000';

        game.load.tilemap('mapMine', 'assets/mine2.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('tilea4', 'assets/tilea4.png');
        game.load.image('mine-floor', 'assets/mine-floor.png');

        game.load.spritesheet('characterRooms', 'assets/organi11.png', 32, 32, 48);

        game.load.spritesheet('bomb', 'assets/BombExploding.png', 32, 64, 13);

        game.load.spritesheet('characterEnemy', 'assets/organi11.png', 32, 32, 12);

        game.load.image('scroll2', 'assets/scroll2.png');

        // from underworld

        game.load.tilemap('mapUnderworld', 'assets/underworld.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('rpgtileset', 'assets/rpgtileset.png');

        game.load.spritesheet('coin', 'assets/coin.png', 32, 32);

        game.load.image('smallMap', 'assets/smallMap.png');

        // from greenUnderworld

        game.load.image('paper', 'assets/paper.png');

        game.load.tilemap('mapGreenUnderw', 'assets/greenUnderworld.json', null, Phaser.Tilemap.TILED_JSON);

        game.load.image('tilea5', 'assets/tilea5.png');

    },
    
    create: function () {
        game.state.start('startScreen');
    }
};