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

    public function searchUser($email){

        try{
            $stmtMail = $this->conn->prepare("SELECT * FROM usuario WHERE email = :email");
            $stmtMail->bindParam(':email', $email, PDO::PARAM_STR);
            if ($stmtMail->execute() && $stmtMail->rowCount() > 0) {
                return $stmtMail->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }

    }
        public function drawUsers(){
        $array=[];
        for($n=0;$n<count($this->Usuarios);$n++){
            $array[$n]=[$this->Usuarios[$n]->GetEmail(),$this->Usuarios[$n]->GetNombre(),$this->Usuarios[$n]->GetTipo()];
        }
        return $array;
    }


}