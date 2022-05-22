<?php
// Script de Joan
class sesionUsuario extends usuarios
{

    public function __construct()
    {
        session_start();
    }

    public function SetCurrentUser($user,$level){
        $_SESSION['user'] = $user;
        $_SESSION['level'] = $level;
    }

    public function GetCurrentUser(){
        return [$_SESSION['user'],$_SESSION['level']];
    }

    public function CloseSession(){
        session_unset();
        session_destroy();
    }
}
