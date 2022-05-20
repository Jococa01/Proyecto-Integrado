<?php
// Script de Joan
//Utilizo el script de autoload para acceder a la carpeta donde tengo las clases almacenadas
require_once('autoload.php');

$Entradas = new entradas();
$Entradas->searchEntry($_POST['search']);

echo json_encode($Entradas->loadSearch());