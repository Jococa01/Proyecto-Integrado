<?php

/* 

TOT ESTE DOCUMENT ESTÀ INTENTAT FER PER  Sergio, Natàlia y Alex   :)     
hem posat tot el nostre ingeni i llagrimes en estos documents :(
    
PD: Aproba-mos perfavor <3
PD2: haz com dumbledore y dona-nos 5 punts <3 :)

*/



class comentarios extends connection
{
    // protected $titulo;
    // protected $comentario;
    // protected $identrada;

    // public function __construct($titulo, $comentario, $identrada)
    // {
    //     $this->titulo = $titulo;
    //     $this->comentario = $comentario;
    //     $this->identrada = $identrada;
    // }


    public function insertComentario($data)
    {
        try {
            $stmtInsert = $this->conn->prepare("INSERT INTO comentarios VALUES(?,?)");
            $stmtInsert->bindParam(1, $titulo, PDO::PARAM_STR);
            $stmtInsert->bindParam(2, $comentario, PDO::PARAM_STR);

            $titulo = $data["titulo"];
            $comentario = $data["comentario"];

            $stmtInsert->execute();
            return $stmtInsert->rowCount();

        } catch (Exception | PDOException $e) {
            echo 'Falló la inserción: ' . $e->getMessage();
        }
    }
}
