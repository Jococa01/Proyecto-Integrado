<?php

class usuarios extends connection{

    protected $Usuarios=[];

    public function newUser($data){
        
        try {
            $stmtInsert = $this->conn->prepare("INSERT INTO usuario VALUES(?,?,?,?,?)");
            $stmtInsert->bindParam(1, $id, PDO::PARAM_INT);
            $stmtInsert->bindParam(2, $email, PDO::PARAM_STR);
            $stmtInsert->bindParam(3, $contrasenya, PDO::PARAM_STR);
            $stmtInsert->bindParam(4, $nombre, PDO::PARAM_STR);
            $stmtInsert->bindParam(5, $tipo, PDO::PARAM_STR);

            $id = $data["id"];
            $email = $data["email"];
            $contrasenya = $data["contrasenya"];
            $nombre = $data["nombre"];
            $tipo = $data["tipo"];

            $stmtInsert->execute();
            return $stmtInsert->rowCount();

        } catch (Exception | PDOException $e) {
            echo 'Falló la inserción: ' . $e->getMessage();
        }

    }

}