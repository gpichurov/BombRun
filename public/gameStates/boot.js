/**
 * Created by maya on 26-Mar-16.
 */

var bootState = {

    create: function () {
        this.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;

        this.scale.pageAlignHorizontally = true;
        this.scale.pageAlignVertically = true;

        game.physics.startSystem(Phaser.Physics.ARCADE);

        game.state.start('load');
    }

};