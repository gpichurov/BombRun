/**
 * Created by maya on 26-Mar-16.
 */

var game = new Phaser.Game(1300, 580, Phaser.AUTO, 'game-div');

game.state.add('boot', bootState);
game.state.add('load', loadState);
game.state.add('startScreen', startScreen);
game.state.add('firstTown', firstTown);
game.state.add('greenUnderworld', greenUnderworld);
game.state.add('mineRoom', mineRoom);
game.state.add('underworld', underworld);
game.state.add('gameOver', gameOver);
game.state.add('win', winState);

game.state.start('boot');