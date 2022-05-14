<?php

class usuario{

protected $Email;
protected $Contrasenya;
protected $Nombre;
protected $Tipo;

public function __construct($Email,$Contrasenya,$Nombre,$Tipo)
{
    $this->Email = $Email;
    $this->Contrasenya = $Contrasenya;
    $this->Nombre = $Nombre;
    $this->Tipo = $Tipo;
}

/**
 * Get the value of Email
 */ 
public function getEmail()
{
return $this->Email;
}

/**
 * Get the value of Contrasenya
 */ 
public function getContrasenya()
{
return $this->Contrasenya;
}

/**
 * Get the value of Nombre
 */ 
public function getNombre()
{
return $this->Nombre;
}

/**
 * Get the value of Tipo
 */ 
public function getTipo()
{
return $this->Tipo;
}
}