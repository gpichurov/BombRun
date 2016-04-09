/**
 * Created by maya on 26-Mar-16.
 */
var logo;
var startScreen = {

    preload: function () {
        game.stage.backgroundColor = '#679BCA';
    },

    create: function () {
       // background = this.add.tileSprite(0,0, window.innerWidth * window.devicePixelRatio, window.innerHeight * window.devicePixelRatio, 'background');
        /*var nameLabel = game.add.text(490, 180, 'Awesome game',
            {font: '50px Arial', fill: '#fff'});*/
        logo = this.add.image(400, 180, 'logo');

        var btn = this.game.add.button(560, 340, 'buttonPlay', this.start);

        //island = game.add.sprite(850, 270, 'island');
        //castle = game.add.sprite(0, 60, 'castle');
    },

    start: function () {
        //game.state.start('menu');
        game.state.start('firstTown');
       // game.state.start('greenUnderworld');
    }

};