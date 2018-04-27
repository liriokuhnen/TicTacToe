// Game
var gameStatus = 0;
var round = 0;
var playerWinner = 0;
var blockIsBlocked = 0;
var alreadyClicked = [];

// Board
var boardStatus = [
    ["", "", ""],
    ["", "", ""],
    ["", "", ""],
];

// Player
var player1;
var player2;
var current_player;
var optionalPlayers = ['x', 'o'];

// Bot API
var bot_endpoint = 'src/Api/NextMove.php';

// Score
var player1Win = 0;
var player2Win = 0;
var roundAmout = 0;

// win rules
var map_winner = [
    // Horizontal
    ['00', '10', '20'],
    ['01', '11', '21'],
    ['02', '12', '22'],
    
    // Vertical
    ['00', '01', '02'],
    ['10', '11', '12'],
    ['20', '21', '22'],

    //diagonal
    ['00', '11', '22'],
    ['02', '11', '20'],
];