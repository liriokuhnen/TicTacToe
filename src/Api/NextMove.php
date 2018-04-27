<?php

require '../../vendor/autoload.php';

use TicTacToe\Controller\PlayerController;


function ResponseHttp($status, $response_array)
{
	header("Content-Type:application/json");
	header("HTTP/1.1 ".$status);
	echo json_encode($response_array);
}

function getJsonContent()
{
	$json = file_get_contents('php://input');
	return json_decode($json);
}

$obj = getJsonContent();

$player_controller = new PlayerController();
$next_move = $player_controller->getNextMove($obj->data, $obj->player_type, $obj->level);
if($next_move){
	$response['next_move'] = $next_move;
	ResponseHttp(200, $response);
} else {
	$response['message'] = 'dont have available move';
	ResponseHttp(400, $response);
}
