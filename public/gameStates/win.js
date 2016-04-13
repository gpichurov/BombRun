/**
 * Created by maya on 26-Mar-16.
 */

var winState = {
    create: function () {
        var winLabel = game.add.text(game.world.width - 100, game.world.height - 600, 'You win !',
            {font: '50px Arial', fill: '#fff'});

        var startLabel = game.add.text(game.world.width - 100, game.world.height - 150, 'Press R to restart',
            {font: '25px Arial', fill: '#fff'});

        var rKey = game.input.keyboard.addKey(Phaser.Keyboard.R);
        rKey.onDown.addOnce(this.restart, this);

        game.add.sprite(game.world.width - 100,game.world.height - 500,'win');
    },

    restart: function () {
        //game.state.start('boot');
        window.location.href = '/game';
    }
};
