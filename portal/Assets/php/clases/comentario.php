<?php
/* 

TOT ESTE DOCUMENT ESTÀ INTENTAT FER PER  Sergio, Natàlia y Alex   ;)
hem posat tot el nostre ingeni i llagrimes en estos documents :(
    
PD: Aproba-mos perfavor <3
PD2: haz com dumbledore y dona-nos 5 punts <3 :)

*/

use comentario as GlobalComentario;

class comentario extends connection{

    protected $Coment=[];
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

    public function listcom()
    {
        try {

            $sqlAll = "SELECT titulo,comentario FROM comentarios";
            $rowsAll = $this->conn->query($sqlAll);
            while ($Coment = $rowsAll->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->Coment, new comentarios(
                    $Coment["titulo"],
                    $Coment["comentario"]
                  
                ));
            }
            $this->Coment;
        } catch (Exception | PDOException $e) {
            echo 'Falló la búsqueda' . $e->getMessage();
        }
    }
    public function drawcom()
    {
        $array = [];
        for ($n = 0; $n < count($this->Coment); $n++) {
            $array[$n] = [$this->Coment[$n]->getTitulo(), $this->Coment[$n]->getComentario()];
        }
        return $array;
    }
}