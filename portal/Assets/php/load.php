<?php
// Script de Joan -- (Todas las entradas de la wiki, y más que no se han podido subir a tiempo han sido hechas por Xavi)
//Utilizo el script de autoload para acceder a la carpeta donde tengo las clases almacenadas
require_once('autoload.php');

// Creo un objeto de la clase entradas
$entradas = new entradas();

// Obtengo la información de la base de datos de la entrada seleccionada y cargo la información en la página de forma dinámica
$id = $_GET['page'];
$titulo = $entradas->getEntry($id)['titulo'];
$contenido = $entradas->getEntry($id)['contenido'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sample-xavi.css">
    <link rel="shortcut icon" href="../imgs/favicon.ico">
    <!-- <script src="../Javascript/comentaris.js"></script> -->
    <script src="../Javascript/sessioncheck.js"></script>
    <!-- <script src="../Javascript/dynamicload.js"></script> -->
    <title><?= $titulo ?></title>
</head>

<body>
    <?= $contenido ?>
</body>

</html>