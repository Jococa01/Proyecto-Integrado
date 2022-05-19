<?php

require_once('autoload.php');

$Entradas = new entradas();
$Entradas->searchEntry($_POST['search']);

echo json_encode($Entradas->loadSearch());