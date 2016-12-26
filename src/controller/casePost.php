<?php
session_start();

if(!isset($_POST['action'])){
    die();
}
include("../model/class.player.php");
$case = $_POST['action'];
$player = new Player();

switch($case){
    case "login":
        $player->Login();
        break;
    case "unstuck":
        $player->movePlayer($_POST['id']);
        break;
    case "dc":
        $player->disconnectPlayer();
        break;
    default:
        echo 1;
        break;
}