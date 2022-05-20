<?php
require_once('autoload.php');

$Susers = new usuarios();
$entradas = new entradas();

$Susers->userList();
$entradas->entryList();

// $sesion = new sesionUsuario();
$output=[$Susers->GetUsers(),$Susers->GetEntries(),$Susers->drawUsers(),$entradas->drawEntries()];
echo json_encode($output);
