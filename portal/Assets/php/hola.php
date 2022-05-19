<?php

require_once('autoload.php');

$comentario = new comentarios();
$comentario->insertComentario($_POST);

echo json_encode($_POST);