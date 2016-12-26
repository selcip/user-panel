<?php
$json = json_decode(file_get_contents('config/bd.json'), true);
$pdo = new PDO("mysql:host=".$json['jogo']['host'].";dbname=".$json['jogo']['db']."", $json['jogo']['usr'], $json['jogo']['pwd']);
?>
