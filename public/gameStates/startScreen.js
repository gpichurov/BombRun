/**
 * Created by maya on 26-Mar-16.
 */
var logo;
var startScreen = {
    invBox: '',
    btn:'',
    btnCtrl:'',
    btnClose: '',
    ctrlKeys:'',
    spaceKey:'',
    ctrlImg:'',

    preload: function () {
        game.stage.backgroundColor = '#679BCA';
    },

    create: function () {
        logo = this.add.image(350, 180, 'logo');

        this.btn = this.game.add.button(540, 340, 'buttonPlay', this.start);
        this.btnCtrl = this.game.add.button(540, 410, 'buttonControls', this.controls);
    },

    controls: function () {

        this.ctrlImg = game.add.image(10, 10, 'controls');

        this.ctrlImg.inputEnabled = true;

        this.ctrlImg.events.onInputDown.add(listener, this);

        game.stage.cursor = "default";

    },

    start: function () {
        game.state.start('firstTown');
    }
};

function listener() {
    this.ctrlImg.visible = false;
}