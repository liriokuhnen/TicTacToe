$(document).ready(function () {
    $(".board-field").click(function () {
        if(blockIsBlocked){return false;}
        var id = $(this).attr('id');
        setBoardPosition(player1, id);	
    });
});

function startGame(){
    current_player = roundAmout%2 == 0 ? player1 : player2
    gameStatus = 1;
    unblockBoard();
    startRound();
}

function finishGame(){
    gameStatus = 0;
    blockBoard();
}

function resetGame(){
    resetBoard();
    startGame();
}

function startRound(){
    countRound();
    whoIsPlay();
}

function endRound(){
    hasWinner();
    hasFinishRounds();
    if (!gameStatus){
        return resumeRound();
    }
    changeCurrentPlayer();
    startRound();
}

function whoIsPlay(){
    if (current_player == player2){
        blockBoard();
        getBotMove();
    } else {
        unblockBoard();
    }
}