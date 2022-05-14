<?php

require_once('autoload.php');

$Users =  new usuarios();
$Sesion = new sesionUsuario();

// $result = $Users->searchUser($_POST["email"]);
// $jambo = $Users->verifyPassword($_POST['email'],$_POST['passwd']);
$Sesion->SetCurrentUser($_POST['user']);
echo json_encode("Sesión iniciada correctamente");