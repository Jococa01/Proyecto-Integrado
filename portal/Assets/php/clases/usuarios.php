<?php
// Script de Joan
// Hago una clase que herede las propiedades de la clase conexión, para que se conecte a la base de datos, esta clase se encargará de
class usuarios extends connection{

    // Creo un array que me servirá más adelante para almacenar los objetos de la clase usuario
    protected $Usuarios=[];

    // El primer método sería para la creación de un nuevo usuario, a este le pasaré el array data, del cual obtendrá la información necesaria para realizar la inserción en la base de datos
    public function newUser($data){
        // utilizo try y catch por seguridad, se cancelará el proceso en el caso de que haya un error en la conexión al servidor o en la base de datos
        try {
            // preparo la inserción de datos y mediante estamentos preparados asigno a cada una de las columnas de la tabla una de las variables del array que le he pasado
            $stmtInsert = $this->conn->prepare("INSERT INTO usuario VALUES(?,?,?,?)");
            $stmtInsert->bindParam(1, $email, PDO::PARAM_STR);
            $stmtInsert->bindParam(2, $contrasenya, PDO::PARAM_STR);
            $stmtInsert->bindParam(3, $nombre, PDO::PARAM_STR);
            $stmtInsert->bindParam(4, $tipo, PDO::PARAM_STR);

            $email = $data["email"];
            // para la inserción de la contraseña utilizo una función nativa de php que es md5, esto me permitirá convertir la contraseña del usuario a un hash, lo cual aporta mucho a la seguridad de la página y no afecta a la hora de realizar comprobaciones en el login o en otras funcionalidades puesto que este sistema de codificación es prácticamente unilateral y es casi imposible descifrarlo
            $contrasenya = md5($data["contrasenya"]);
            $nombre = $data["nombre"];
            $tipo = $data["tipo"];

            // Una vez he terminado de prepar los datos ejecuto la sentencia sql para que se realice la inserción en la base de datos
            $stmtInsert->execute();
            return $stmtInsert->rowCount();

        } catch (Exception | PDOException $e) {
            echo 'Falló la inserción: ' . $e->getMessage();
        }

    }

    // Este método sirve para encontrar un usuario por su email, lo utilizaré para realizar comprobaciones a la hora de crear nuevas cuentas. Le pasaré el email como parámetro
    public function searchUser($email){
        // utilizo try y catch por seguridad, se cancelará el proceso en el caso de que haya un error en la conexión al servidor o en la base de datos
        try{
            // Para este método también utilizaré estamentos preparados, en este caso haré un filtrado con la claúsula where en la sentencia sql
            $stmtMail = $this->conn->prepare("SELECT * FROM usuario WHERE email = :email");
            $stmtMail->bindParam(':email', $email, PDO::PARAM_STR);
            if ($stmtMail->execute() && $stmtMail->rowCount() > 0) {
                return $stmtMail->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }

    }

    // Este método sirve para comprobar si la contraseña introducida corresponde con el correo aportaddo. Pasaré como parámetros tanto el correo como la contraseña
    public function verifyPassword($email,$password){

        try{
            // Para este método también utilizaré estamentos preparados, en este caso haré un filtrado con la claúsula where en la sentencia sql
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

    // Este método se encarga de obtener el número total de usuarios registrados en la base de datos. No requiere de parámetros puesto que no hace falta comporbar nada externo con la consulta
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

    // Este método se encarga de obtener el número total de entradas alamcenadas en la base de datos. No requiere de parámetros puesto que no hace falta comporbar nada externo con la consulta
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