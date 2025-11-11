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

$sql= "INSERT INTO DEPARTAMENTO VALUES ('$nombre','$amueblado','$precio')";


$sql->binParam(2,$nombre,PDO:: PARAM_STR);
$sql->binParam(3,$amueblado,PDO:: PARAM_STR);
$sql->binParam(4,$precio,PDO:: PARAM_STR);

    if( $sql->execute){
        header("Location:../departamentos.php");
    }else{
        header("Location:../departamentos.php");
    }

}}


?>
