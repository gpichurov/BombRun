/**
 * Created by maya on 09-Apr-16.
 */

/*function collisionPlayerEnemy(player, enemy) {
    enemy.body.immovable = true;
    player.kill();
}*/



/*function killEnemy(player, coin) {

    var a = coin.animations.currentFrame.index;
    if (a == 8) {
        player.scale.setTo(1,1);
        playerX = player.body.x;
        playerY= player.body.y;
        bombX = coin.body.x;
        bombY = coin.body.y;
        if (playerX-bombX<=50 && playerY-bombY<=50 && playerX-bombX>=0 && playerY-bombY>=0 ){
            player.kill();

            identificator++;
            releasedObjects(identificator);
            /!*var singleScroll2 = underworld.smallMaps.create(playerX, playerY, 'smallMap');*!/
        }
        //coin.kill();

    } else {
        // coin.kill();
        // player.kill();
        //this.killEnemy1 = true;
    }
}*/

function releasedObjects(identificator) {
    /* room = this;*/
    for (var i = 1; i <= identificator; i++) {
        if (identificator == 1) {
            var singleScroll2 = underworld.smallMaps.create(playerX, playerY, 'smallMap');
        } else if (identificator == 2) {
            var coin1 = coins.create(playerX, playerY, 'coin');
        }
    }
}


