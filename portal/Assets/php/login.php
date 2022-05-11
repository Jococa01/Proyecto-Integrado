<?php

require_once('autoload.php');

// $SampleMail = [
//     "id" => 1,
//     "email" => "joancoronado12@gmail.com",
//     "contrasenya" => "8pro121,C",
//     "nombre" => "Joan",
//     "tipo" => "administrador"
// ];

$Users =  new usuarios();

$result = $Users->searchUser($_POST["email"]);

// var_dump($result['email']);

if ($result == null) {
    echo json_encode("No existe ese usuario");
    // $Users->newUser($SampleMail);
} else {
    echo json_encode("Existe un usuario con mail: " . $result['email']);
}
