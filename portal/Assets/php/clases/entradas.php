<?php

class entradas extends connection{


    protected $Entradas=[];
    protected $BusquedaEntradas=[];


    public function newEntry($data){
        
        try {
            $stmtInsert = $this->conn->prepare("INSERT INTO entrada VALUES(?,?,?,?,?)");
            $stmtInsert->bindParam(1, $codigoPag, PDO::PARAM_INT);
            $stmtInsert->bindParam(2, $nombreEditor, PDO::PARAM_STR);
            $stmtInsert->bindParam(3, $fecha, PDO::PARAM_STR);
            $stmtInsert->bindParam(4, $titulo, PDO::PARAM_STR);
            $stmtInsert->bindParam(5, $contenido, PDO::PARAM_STR);

            $codigoPag = $data["codigoPag"];
            $nombreEditor = $data["nombreEditor"];
            $fecha = $data["fecha"];
            $titulo = $data["titulo"];
            $contenido = $data["contenido"];

            $stmtInsert->execute();
            return $stmtInsert->rowCount();

        } catch (Exception | PDOException $e) {
            echo 'Falló la inserción: ' . $e->getMessage();
        }

    }

    public function searchEntry($search){

        try{
            $localsearch = "%".$search."%";

            $sqlAll = "SELECT codigoPagina,nombreEditor,fecha,titulo,contenido FROM entrada where titulo like ".'\''.$localsearch.'\'';
            $rowsAll = $this->conn->query($sqlAll);
            while ($Entrada = $rowsAll->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->BusquedaEntradas, new entrada(
                    $Entrada["codigoPagina"],
                    $Entrada["nombreEditor"],
                    $Entrada["fecha"],
                    $Entrada["titulo"],
                    $Entrada["contenido"]
                ));
            }
            $this->BusquedaEntradas;
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }

    }

    public function entryList(){
        try{
            $sqlAll = "SELECT codigoPagina,nombreEditor,fecha,titulo,contenido FROM entrada";
            $rowsAll = $this->conn->query($sqlAll);
            while ($Entrada = $rowsAll->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->Entradas, new entrada(
                    $Entrada["codigoPagina"],
                    $Entrada["nombreEditor"],
                    $Entrada["fecha"],
                    $Entrada["titulo"],
                    $Entrada["contenido"]
                ));
            }
            $this->Entradas;
        } catch (Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }
    }

    public function drawEntries(){
        $array=[];
        for($n=0;$n<count($this->Entradas);$n++){
            $array[$n]=[$this->Entradas[$n]->getCodigoPagina(),$this->Entradas[$n]->getNombreEditor(),$this->Entradas[$n]->getFecha(),$this->Entradas[$n]->getTitulo(),$this->Entradas[$n]->getContenido()];
        }
        return $array;
    }

    public function loadSearch(){
        $array=[];
        for($n=0;$n<count($this->BusquedaEntradas);$n++){
            $array[$n]=[$this->BusquedaEntradas[$n]->getCodigoPagina(),$this->BusquedaEntradas[$n]->getNombreEditor(),$this->BusquedaEntradas[$n]->getFecha(),$this->BusquedaEntradas[$n]->getTitulo(),$this->BusquedaEntradas[$n]->getContenido()];
        }
        return $array;
    }


    public function getEntry($id){

        try{
            $stmtEntry = $this->conn->prepare("SELECT codigoPagina,nombreEditor,fecha,titulo,contenido FROM entrada WHERE codigoPagina = :codigoPag");
            $stmtEntry->bindParam(':codigoPag', $id, PDO::PARAM_STR);
            if ($stmtEntry->execute() && $stmtEntry->rowCount() > 0) {
                return $stmtEntry->fetch(PDO::FETCH_ASSOC);
            }

        }catch(Exception | PDOException $e){
            echo 'Falló la búsqueda'.$e->getMessage();
        }

    }

}