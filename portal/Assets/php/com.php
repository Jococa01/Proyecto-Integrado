<?php

require_once('autoload.php');

$comentario = new comentario();

$comentario->listcom();
// $sesion = new sesionUsuario();
$output=[$comentario->drawcom()];


echo json_encode($output);