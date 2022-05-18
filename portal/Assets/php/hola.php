<?php
require_once('autoload.php');

$comentario = new comentarios();
$comentario->insertComentario($_POST["titulo"], $_POST["comentario"]);

echo json_encode($_POST);


