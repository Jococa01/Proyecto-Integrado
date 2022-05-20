<?php
// Script de Joan
//Utilizo el script de autoload para acceder a la carpeta donde tengo las clases almacenadas
require_once('autoload.php');

// Creo un objeto de la clase sesionUsuario y otro de la clase usuarios
$sesionusuario = new sesionUsuario();
$user =  new usuarios();

// Antes de nada compruebo si ha habido una petición para cerrar la sesión
if(isset($_GET['close'])){

    // En el caso de así serlo, elimino los datos de $_SESSION y cambio parte del menú de navigación para que muestre los botones de inicar sesión y vrear una cuenta
    $sesionusuario->CloseSession();
    echo json_encode('<div class="navbar-item">
    <div class="buttons" id="endbuttons">
      <a class="button is-primary" href="./signup.html">
        <strong>Sign up</strong>
      </a>
      <a class="button is-light" href="./login.html">
        Log in
      </a>
    </div>
  </div>');

}else{
    // Si no es el caso hago varias comprobaciones
    // Compruebo si hay una variable de sesión para el usuario, si es así envio al javascript todos los datos almacenados en $_SESSION
    if(isset($_SESSION['user'])){
      
        echo json_encode($_SESSION);
    
    }else if(isset($_POST['usuario']) && isset($_POST['contrasenya'])){
    
        echo json_encode(null);
    
    }else{
        echo json_encode(null);
    }
}