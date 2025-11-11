<?php
// guardar_departamento.php
include 'conexion.php';

// Capturar datos del formulario
$id_departamento = $_POST['id_departamento'];
$nombre_D = trim($_POST['nombre_D']);
$precio = floatval($_POST['precio']);
// Un checkbox solo se envía si está marcado. Si no se envía, es 0 (FALSE).
$amueblado = isset($_POST['amueblado']) ? 1 : 0; 

if (empty($nombre_D)) {
    die("El nombre del departamento no puede estar vacío.");
}

if ($id_departamento) {
    // -----------------------------------------------------
    // UPDATE (Actualizar registro existente)
    // -----------------------------------------------------
    $stmt = $conectar->prepare("UPDATE DEPARTAMENTO SET nombre_D = ?, amueblado = ?, precio = ? WHERE id_departamento = ?");
    // 's i d i' -> string, integer (boolean), double (decimal), integer
    $stmt->bind_param("sidi", $nombre_D, $amueblado, $precio, $id_departamento);

    if ($stmt->execute()) {
        $message = "Departamento actualizado exitosamente.";
    } else {
        $message = "Error al actualizar: " . $stmt->error;
    }

} else {
    // -----------------------------------------------------
    // CREATE (Insertar nuevo registro)
    // -----------------------------------------------------
    $stmt = $conectar->prepare("INSERT INTO DEPARTAMENTO (nombre_D, amueblado, precio) VALUES (?, ?, ?)");
    // 'sid' -> string, integer (boolean), double (decimal)
    $stmt->bind_param("sid", $nombre_D, $amueblado, $precio);

    if ($stmt->execute()) {
        $message = "Departamento guardado exitosamente.";
    } else {
        $message = "Error al guardar: " . $stmt->error;
    }
}

$stmt->close();
$conectar->close();

// Redireccionar a la página principal con un mensaje (opcional, pero útil)
header("Location: departamentos.php?msg=" . urlencode($message));
exit();
?>