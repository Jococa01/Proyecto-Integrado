<?php

require_once('autoload.php');

$SampleMail = [
    "id" => 1,
    "email" => "joancoronado12@gmail.com",
    "contrasenya" => "8pro121,C",
    "nombre" => "Joan",
    "tipo" => "administrador"
];

$Users =  new usuarios();

$result = $Users->searchUser("joancoronado12@gmail.com");

// var_dump($result['email']);

if ($result == null) {
    echo "No existe ese usuario";
    $Users->newUser($SampleMail);
} else {
    echo "Existe un usuario con mail: " . $result['email'];
}
