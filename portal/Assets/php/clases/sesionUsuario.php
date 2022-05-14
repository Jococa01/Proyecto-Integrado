<?php

class sesionUsuario
{

    public function __construct()
    {
        session_start();
    }

    public function SetCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function GetCurrentUser(){
        return $_SESSION['user'];
    }

    public function CloseSession(){
        session_unset();
        session_destroy();
    }
}
