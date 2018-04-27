function getBotMove(){
    payload = JSON.stringify({
        "data": boardStatus,
        "player_type": player2,
        "level": $('#level').val(),
    });

    $.ajax({
        url: bot_endpoint,
        type: "POST",
        dataType: "json",
        contentType: 'application/json',
        async: true,
        data: payload,
    }).done(function (response) {
        setBoardPosition(player2, response.next_move);
    }).fail(function(error) {
        set_message('danger', '<strong>Ooh Noo!</strong> our bot was it a personal problem at this moment, please give him a short time and come again soon.');
    });
}

function setPlayers(player){
    player1 = player;
    player2 = changePlayer(player);

    $("#player-select").addClass('hide');
    $("#board").removeClass('hide');
    $("#score").removeClass('hide');

    startGame();
}

function changeCurrentPlayer(){
    current_player = changePlayer(current_player);
}

function changePlayer(player){
    return player == 'x' ? 'o' : 'x';
}