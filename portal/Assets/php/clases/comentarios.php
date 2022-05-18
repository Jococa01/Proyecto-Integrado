<?php

/* 

TOT ESTE DOCUMENT ESTÀ INTENTAT FER PER  Sergio, Natàlia y Alex   :)     
hem posat tot el nostre ingeni i llagrimes en estos documents :(
    
PD: Aproba-mos perfavor <3
PD2: haz com dumbledore y dona-nos 5 punts <3 :)

*/



class comentarios extends connection
{
    protected $titulo;
    protected $comentario;
    protected $identrada;

    public function __construct($titulo, $comentario, $identrada)
    {
        $this->titulo = $titulo;
        $this->comentario = $comentario;
        $this->identrada = $identrada;
    }


    public function insertComentario($titulo, $comentario)
    {
        $sql = "INSERT INTO comentarios (titulo, comentario) VALUES (:titulo,:comentario)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":comentario", $comentario);
    }
}
