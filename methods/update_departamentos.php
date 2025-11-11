<?php
// update_departamentos.php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Capturar todos los datos (incluyendo el ID oculto)
    $id = $_POST['id_departamento']; 
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // 2. Ejecutar la consulta UPDATE
    $stmt = $conectar->prepare("UPDATE departamentos SET nombre_D = ?, precio = ? WHERE id_departamento = ?");
    $stmt->bind_param("sss", $nombre, $precio, $id); // sss asumiendo strings
    
    if ($stmt->execute()) {
        // Redirigir de vuelta al listado principal (Patrón PRG)
        header("Location: departamentos.php?actualizado=true");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
    $stmt->close();
}
?>