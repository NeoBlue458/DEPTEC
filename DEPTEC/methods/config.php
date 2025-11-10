<?php

$servidor="localhost";
$usuario="root";
$basedatos="deptec";
$pass="";

$conectar = mysqli_connect($servidor,$usuario,$pass,$basedatos);

if($conectar->connect_error){
    die("Error".$conectar->connect_error());
}

class InsDep{
public static function insert_departamentos(){

$id = null;
$nombre = $_POST['nombre'];
$amueblado = $_POST['amueblado'];
$precio = $_POST['precio'];

$sql= "INSERT INTO DEPARTAMENTO VALUES ('$id','$nombre','$amueblado','$precio')";

$sql->binParam(1,$id,PDO:: PARAM_STR);
$sql->binParam(2,$nombre,PDO:: PARAM_STR);
$sql->binParam(3,$amueblado,PDO:: PARAM_STR);
$sql->binParam(4,$precio,PDO:: PARAM_STR);


}}
?>
