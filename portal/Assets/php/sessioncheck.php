<?php
require_once('autoload.php');

// echo json_encode("Test");

$sesionusuario = new sesionUsuario();
$user =  new usuarios();

if(isset($_GET['close'])){

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
    if(isset($_SESSION['user'])){

        echo json_encode($_SESSION);
    
    }else if(isset($_POST['usuario']) && isset($_POST['contrasenya'])){
    
        echo json_encode(null);
    
    }else{
        echo json_encode(null);
    }
}