<?php

require_once('autoload.php');

//Inserción de prueba para la base de datos

// $SampleMail = [
//     "id" => 1,
//     "email" => "joancoronado12@gmail.com",
//     "contrasenya" => "8pro121,C",
//     "nombre" => "Joan",
//     "tipo" => "administrador"
// ];

//Creo un objeto de la clase de usuarios
$Users =  new usuarios();

//Cojo lo que ha enviado el formulario de login, en este caso es la direccion de correo
$result = $Users->searchUser($_POST["email"]);

//Compruebo si la dirección de correo existe en la base de datos
if ($result == null) {
    //Si no existe devuelvo null al JavaScript, porque es más facil de trabajar que con un espacio
    echo json_encode(null);
} else {

    echo json_encode($result);

    //Si existe la dirección de correo lo indico por consola
    // echo json_encode("Existe el usuario con mail: " . $result['email']);
    
    //Una vez se confirma la existencia del correo en la base de datos, compruebo si la contraseña es correcta
    // $cont = $_POST['contrasenya'];
    // if($result['contrasenya'] != $_POST['contrasenya']){
        
    //     echo json_encode("Existe el usuario con mail: " . $result['email']." pero la contraseña: ".$_POST['contrasenya']." es incorrecta");

    // }else{

    //     echo json_encode("Existe el usuario con mail: " . $result['email']." y contraseña: ".$_POST['contrasenya']);

    // }
}
