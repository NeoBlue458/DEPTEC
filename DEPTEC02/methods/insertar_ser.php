<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Nombre"]) && isset($_POST["Precio"])) {
        $Nombre = $_POST["Nombre"];
        $Precio = $_POST["Precio"];

        $insertar = $conectar->prepare("INSERT INTO servicios (Nombre, Precio) VALUES (?, ?)");
        $insertar->bind_param("ss", $Nombre, $Precio);

        if ($insertar->execute()) {
            echo "Los datos fueron insertados correctamente";
        } else {
            echo "Error de inserción: " . $insertar->error;
        }
    } else {
        echo "No se recibieron los datos correctamente.";
    }
}
?>
