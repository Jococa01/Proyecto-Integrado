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


    
    public function sistemadminList()
    {

        //hacer
        $employees = $this->($email);
        $output = "";
        foreach ($employees as $employee) {
            $output .= " <tr>";
            $output .= " <td>" . $employee->getEmployeeNumber() . "</td>";
            $output .= " <td>". "EXT: " . $employee->getExtension() . "/Email: " . $employee->getEmail() . "/Office: " . $employee->getOfficeCode() . "</td>";
            $output .= " <td>"."<a href='update.php?employeeNumber=" . $employee->getEmployeeNumber() ."'". $employee->getEmployeeNumber() . "'><img src='img/edit_icon.png' width='25'></a></td>'";
            $output .= "</tr>";
        }
        return $output;
        
    }

}