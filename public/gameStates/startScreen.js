/**
 * Created by maya on 26-Mar-16.
 */
var logo;
var startScreen = {

    preload: function () {
        game.stage.backgroundColor = '#679BCA';
    },

    create: function () {
        logo = this.add.image(350, 180, 'logo');

        var btn = this.game.add.button(540, 340, 'buttonPlay', this.start);
        var btnCtr = this.game.add.button(540, 410, 'buttonControls', this.controls);
    },

    start: function () {
        game.state.start('firstTown');
    },

    controls: function () {
        control.log('control');
    }

};