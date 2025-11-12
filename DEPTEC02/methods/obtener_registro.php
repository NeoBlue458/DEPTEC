<?php
include '../clases/c_departamentos.php'; 

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $departamento = C_Departamentos::ObtenerDepartamentoPorId($id);

    if ($departamento) {
        // Devolver el registro como JSON
        echo json_encode(['success' => true, 'data' => $departamento]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Departamento no encontrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de departamento no proporcionado.']);
}
?>