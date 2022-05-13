<?php

require_once('autoload.php');

$Users =  new usuarios();
$Sesion = new sesionUsuario();

// $result = $Users->searchUser($_POST["email"]);
echo json_encode($_POST);