<?php

class usuarios extends connection{

    protected $Usuarios=[];

    public function newUser($data){
        
        try {
            $stmtInsert = $this->conn->prepare("INSERT INTO usuario VALUES(?,?,?,?)");
            $stmtInsert->bindParam(1, $email, PDO::PARAM_STR);
            $stmtInsert->bindParam(2, $contrasenya, PDO::PARAM_STR);
            $stmtInsert->bindParam(3, $nombre, PDO::PARAM_STR);
            $stmtInsert->bindParam(4, $tipo, PDO::PARAM_STR);

            $email = $data["email"];
            $contrasenya = md5($data["contrasenya"]);
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

    public function verifyPassword($email,$password){

        try{
            $stmtMail = $this->conn->prepare("SELECT * FROM usuario WHERE email = :email and contrasenya = :pass");
            $stmtMail->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtMail->bindParam(':pass', $password, PDO::PARAM_STR);
            if ($stmtMail->execute() && $stmtMail->rowCount() > 0) {
                return $stmtMail->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }

    }

    public function GetUsers(){
        try{
            $stmtUserC = $this->conn->prepare("SELECT count(*) as users FROM usuario");
            if ($stmtUserC->execute() && $stmtUserC->rowCount() > 0) {
                return $stmtUserC->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }
    }

    public function GetEntries(){
        try{
            $stmtUserC = $this->conn->prepare("SELECT count(*) as entradas FROM entrada");
            if ($stmtUserC->execute() && $stmtUserC->rowCount() > 0) {
                return $stmtUserC->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }
    }

    public function userList(){
        try{
            $sqlAll = "SELECT email,contrasenya,nombre,tipo FROM usuario";
            $rowsAll = $this->conn->query($sqlAll);
            while ($Usuario = $rowsAll->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->Usuarios, new usuario(
                    $Usuario["email"],
                    $Usuario["contrasenya"],
                    $Usuario["nombre"],
                    $Usuario["tipo"]
                ));
            }
            $this->Usuarios;
        }catch (Exception | PDOException $e){
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