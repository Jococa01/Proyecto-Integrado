<?php
require_once('autoload.php');

$Susers = new usuarios();
$Susers->userList();
// $sesion = new sesionUsuario();
$output=[$Susers->GetUsers(),$Susers->GetEntries(),$Susers->drawUsers()];
echo json_encode($output);
