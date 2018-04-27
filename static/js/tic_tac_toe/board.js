function setBoardPosition(player, position){
    if(alreadyClicked.includes(position)){return false;}
    $("#" + position).removeAttr('href');
    $("#" + position + " .min-height").html(current_player);

    var x = parseInt(position.substr(1,1));
    var y = parseInt(position.substr(3,1));

    boardStatus[y][x] = current_player;

    alreadyClicked.push(position);

    endRound();
}

function blockBoard(){
    blockIsBlocked = 1;
}

function unblockBoard(){
    blockIsBlocked = 0;
}

function hasWinner(){
    optionalPlayers.forEach(function(player) {
        map_winner.forEach(function(match_winner) {
            if(checkWinnerMap(match_winner, player)){
                playerWinner = player;
                if (player == player1){
                    player1Win += 1;
                    win_message = 'You win';
                } else if (player == player2){
                    player2Win += 1;
                    win_message = 'Bot win';
                }
                setResumeGameMessage(win_message);
                console.log(match_winner);
                colorWin(match_winner);
                finishGame();
            }
        }); 
    });
}

function checkWinnerMap(wp, player){
    if(boardStatus[wp[0].substr(1,1)][wp[0].substr(0,1)] == player &&
        boardStatus[wp[1].substr(1,1)][wp[1].substr(0,1)] == player &&
        boardStatus[wp[2].substr(1,1)][wp[2].substr(0,1)] == player){
        return true;
    }
    return false;
}

function hasFinishRounds(){
    if (round >= 9 && gameStatus){
        setResumeGameMessage('No one won');
        finishGame();
    }
}

function countRound(){
    round += 1;
}

function setResumeGameMessage(message){
    $('#game_over_message').html(message);
}

function resumeRound(){
    roundAmout += 1
    $('#game_over_box').removeClass('hide');
    updateScore();
}

function resetBoard(){
    boardStatus = [
        ["", "", ""],
        ["", "", ""],
        ["", "", ""],
    ];
    gameStatus = 0;
    round = 0;
    playerWinner = 0;
    alreadyClicked = [];
    
    $(".board-field").attr('href', '#');
    $(".board-field .min-height").html('');
    $(".board-field .min-height").removeClass('bg-win');

    $('#game_over_box').addClass('hide');
}

function colorWin(win){
    win.forEach(function(win_xy) {
        $("#x"+win_xy.substr(0,1)+"y"+win_xy.substr(1,1)+" .min-height").addClass('bg-win');
    });
}

function updateScore(){
    $('.player1win').html(player1Win);
    $('.player2win').html(player2Win);
}