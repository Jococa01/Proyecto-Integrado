<?php
// Script de Joan
//Utilizo el script de autoload para acceder a la carpeta donde tengo las clases almacenadas
require_once('autoload.php');

// Creo un objeto de la clase sesionUsuario y otro de la clase usuarios
$Users =  new usuarios();
$Sesion = new sesionUsuario();

// Asigno a $_SESSION la información pertinente para trabajar con el usuario
echo json_encode($Sesion->SetCurrentUser($_POST['user'],$_POST['level']));