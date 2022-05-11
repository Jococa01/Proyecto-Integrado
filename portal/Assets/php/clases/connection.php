<?php

class connection{
    protected $conn;
    public function __construct()
    {
        $fichero = file_get_contents("../json/db.json");
        $datosDB = json_decode($fichero,true);

        $servername = $datosDB["servername"];
        $username = $datosDB["username"];
        $password = $datosDB["password"];
        $db = $datosDB["db"];

        //Establece la conexión
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
    public function __destruct()
    {
        //cierra la conexión
        $this->conn = null;
    }
}