<?php
/* 

TOT ESTE DOCUMENT ESTÀ INTENTAT FER PER  Sergio, Natàlia y Alex   ;)
hem posat tot el nostre ingeni i llagrimes en estos documents :(
    
PD: Aproba-mos perfavor <3
PD2: haz com dumbledore y dona-nos 5 punts <3 :)

*/
require_once('autoload.php');

$comentario = new comentario();

$comentario->listcom();
// $sesion = new sesionUsuario();
$output=[$comentario->drawcom()];


echo json_encode($output);