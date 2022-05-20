<?php
require_once('autoload.php');

$entradas = new entradas();

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
    <script src="../Javascript/comentaris.js"></script>
    <script src="../Javascript/sessioncheck.js"></script>
    <script src="../Javascript/dynamicload.js"></script>
    <title><?= $titulo ?></title>
</head>

<body>
    <?= $contenido ?>
</body>

</html>