<?php
$json = json_decode(file_get_contents('config/bd.json'), true);
$pdo = new PDO("mysql:host=".$json['forum']['host'].";dbname=".$json['forum']['db']."", $json['forum']['usr'], $json['forum']['pwd']);
?>
