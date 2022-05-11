<?php

class usuario{

protected $ID;
protected $Email;
protected $Contrasenya;
protected $Nombre;
protected $Tipo;

public function __construct($ID,$Email,$Contrasenya,$Nombre,$Tipo)
{
    $this->ID = $ID;
    $this->Email = $Email;
    $this->Contrasenya = $Contrasenya;
    $this->Nombre = $Nombre;
    $this->Tipo = $Tipo;
}


/**
 * Get the value of ID
 */ 
public function getID()
{
return $this->ID;
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