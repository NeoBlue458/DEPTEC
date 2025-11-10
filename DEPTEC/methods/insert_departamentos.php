<?php
// obtener_registro_por_id.php
include('config.php');
$id = null;
$nombre = $_POST['nombre'];
$amueblado = $_POST['amueblado'];
$precio = $_POST['precio'];

$sql= "INSERT INTO DEPARTAMENTO VALUES ('$id','$nombre','$amueblado','$precio')";

$resultado_de_la_consulta = mysqli_query($conectar,$sql);
// 2. Aplicar la Redirección (PRG)
if ($resultado_de_la_consulta) {
    // Si la inserción fue exitosa:
    header("Location: departamentos.php?insertado=true");
    exit(); // Termina la ejecución del script aquí.
} else {
    // Manejar el error si la inserción falla
    echo "Error al insertar: " . mysqli_error($conectar);
}
?>