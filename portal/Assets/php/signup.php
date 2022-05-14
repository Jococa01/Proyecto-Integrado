<?php
require_once('autoload.php');

$Users =  new usuarios();

$parsedata = [
    "email"=>$_POST['email'],
    "contrasenya"=>md5($_POST['contrasenya']),
    "nombre"=>$_POST['nombre'],
    "tipo"=>"usuario"
];

$result = $Users->searchUser($_POST["email"]);

//Compruebo si la dirección de correo existe en la base de datos
if ($result == null) {
    //Si no existe devuelvo null al JavaScript, porque es más facil de trabajar que con un espacio
    $Users->newUser($parsedata);
    echo json_encode(null);
} else {
    //Si existe la dirección de correo envio los datos del usuario a javascript
    echo json_encode($result);
}
