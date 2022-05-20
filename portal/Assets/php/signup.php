<?php
// Script de Joan
//Utilizo el script de autoload para acceder a la carpeta donde tengo las clases almacenadas
require_once('autoload.php');

$Users =  new usuarios();

// Preparo un array asociativo que recoge la información que el usuario ha puesto al registrarse, el permiso es de nivel básico.
$parsedata = [
    "email"=>$_POST['email'],
    "contrasenya"=>$_POST['contrasenya'],
    "nombre"=>$_POST['nombre'],
    "tipo"=>"usuario"
];

// Hago una consulta en la base de datos para comprobar si ya existe una cuenta con ese correo
$result = $Users->searchUser($_POST["email"]);

if ($result == null) {
    //Si no existe devuelvo null al JavaScript, porque es más facil de trabajar que con un espacio
    $Users->newUser($parsedata);
    echo json_encode(null);
} else {
    //Si existe la dirección de correo, envio los datos del usuario a javascript
    echo json_encode($result);
}
