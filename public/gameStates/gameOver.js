/**
 * Created by maya on 11-Apr-16.
 */

var gameOver = {
    create: function () {
        var gameOverLabel = game.add.text(game.world.width - 100, game.world.height - 600, 'Game over !',
            {font: '50px Arial', fill: '#fff'});

        var startLabel = game.add.text(game.world.width - 100, game.world.height - 150, 'Press R to restart',
            {font: '25px Arial', fill: '#fff'});

        var rKey = game.input.keyboard.addKey(Phaser.Keyboard.R);
        rKey.onDown.addOnce(this.restart, this);

        game.add.sprite(game.world.width - 100,game.world.height - 500,'gameover');
    },

    restart: function () {
        //game.state.start('boot');
        window.location.href = '/game';
    }
};