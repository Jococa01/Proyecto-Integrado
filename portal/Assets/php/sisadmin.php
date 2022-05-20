<?php
// Script de Joan
require_once('autoload.php');

$Susers = new usuarios();
$entradas = new entradas();

$Susers->userList();
$entradas->entryList();

$output=[$Susers->GetUsers(),$Susers->GetEntries(),$Susers->drawUsers(),$entradas->drawEntries()];
echo json_encode($output);
