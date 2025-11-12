<?php

$servidor="localhost";
$usuario="root";
$basedatos="deptec";
$pass="";

$conectar = mysqli_connect($servidor,$usuario,$pass,$basedatos);

if($conectar->connect_error){
    die("Error".$conectar->connect_error);
}
?>
