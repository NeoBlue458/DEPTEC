<?php
// update_departamentos.php (VERSIÓN DEPURACIÓN)
include '../clases/c_departamentos.php'; 

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo json_encode(['success' => false, 'message' => 'No se proporcionó ID de departamento.']);
        exit;
    }

    $id = (int)$_POST['id'];
    $nombre = $_POST['nombre'] ?? 'Sin Nombre';
    $precio = $_POST['precio'] ?? 0;

    $amueblado = "";
    if (!empty($_POST['muebles']) && is_array($_POST['muebles'])) {
        $amueblado = implode(', ', $_POST['muebles']);
    }

    $datos = [
        'id' => $id,
        'nombre' => $nombre,
        'amueblado' => $amueblado,
        'precio' => $precio
    ];

    try {
        // Intenta ejecutar la modificación
        $result = C_Departamentos::ModificarDepartamento($datos);

        if ($result) {
            echo json_encode([
                'success' => true, 
                'message' => 'Departamento actualizado con éxito.',
                'data' => $datos
            ]);
        } else {
            // Esto se ejecuta si la consulta fue válida pero no afectó ninguna fila (el ID no existe)
            echo json_encode(['success' => false, 'message' => 'Error: Cero filas afectadas. El ID no existe en la base de datos.']);
        }
    } catch (PDOException $e) {
        // 🚨 SI HAY UN ERROR DE SQL O DE BINDING, SE CAPTURA AQUÍ.
        // Devolvemos el mensaje de error real de la base de datos.
        echo json_encode([
            'success' => false, 
            'message' => 'ERROR DE BASE DE DATOS: ' . $e->getMessage() . '. SQLSTATE: ' . $e->getCode()
        ]);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>