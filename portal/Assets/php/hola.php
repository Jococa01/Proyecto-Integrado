<?php

require_once('autoload.php');

$comentario = new comentario();
$comentario->insertComentario($_POST);




echo json_encode($_POST);