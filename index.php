<?php
$pagina = filter_input(INPUT_GET,'p');
$pagina = $pagina ?: 'index';
$pagina = 'src/views/' . $pagina . '.php';
if(!file_exists($pagina)) return false;

require_once 'src/models/Player.php';
require_once 'src/models/Util.php';
$player = new Player();
$util = new Util();

require_once $pagina;
