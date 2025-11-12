<?php
include '../clases/c_departamentos.php'; 

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    $result = C_Departamentos::EliminarDepartamento($id);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Departamento eliminado con éxito.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el departamento.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de departamento no proporcionado.']);
}
?>