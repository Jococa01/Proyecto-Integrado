<?php
require_once('autoload.php');

// //Inserción de prueba para la base de datos

// $SampleMail = [
//     "email" => "joancoronado12@gmail.com",
//     "contrasenya" => "8pro121,C",
//     "nombre" => "Joan",
//     "tipo" => "administrador"
// ];

// //Creo un objeto de la clase de usuarios
$Users =  new usuarios();
$Sesion = new sesionUsuario();

// echo json_encode("hola");

// $Users->newUser($SampleMail);

// //Cojo lo que ha enviado el formulario de login, en este caso es la direccion de correo
$result = $Users->searchUser($_POST["email"]);

//Compruebo si la dirección de correo existe en la base de datos
if ($result == null) {
    //Si no existe devuelvo null al JavaScript, porque es más facil de trabajar que con un espacio
    echo json_encode(null);
} else {
    //Si existe la dirección de correo envio los datos del usuario a javascript
    echo json_encode($result);
}