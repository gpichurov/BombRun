/**
 * Created by maya on 26-Mar-16.
 */

    var background;
var bootState = {

    create: function () {
        //background = this.add.tileSprite(0,0, this.world.width, this.world.height, 'background');
        game.physics.startSystem(Phaser.Physics.ARCADE);

        game.state.start('load');



    }

};