<?php
include '../clases/c_departamentos.php'; // Incluimos la clase CRUD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recolección de Datos
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    
    // 2. Manejo de Checkboxes 'amueblado'
    // El formulario 'Agregar' usa un solo 'name="amueblado"'. 
    // Para manejar múltiples selecciones, asumiremos que se enviarán en el campo 'muebles[]'
    // como en tu modal de Edición. Adaptaremos el script para que soporte un array de muebles.
    
    // Si se usa el array 'muebles[]' (como en el modal Editar), lo concatenamos.
    $muebles = isset($_POST['muebles']) ? $_POST['muebles'] : [];
    
    // Si el formulario 'Agregar' usa 'amueblado' como un solo checkbox,
    // o para ser compatible con la estructura del modal 'Editar' (que sí usa array):
    $amueblado_str = !empty($muebles) ? implode(", ", $muebles) : "No";

    $datos = [
        'nombre' => $nombre,
        'precio' => $precio,
        'amueblado' => $amueblado_str
    ];
    
    // 3. Inserción
    $result = C_Departamentos::InsertarDepartamento($datos);

    // 4. Redirección (como en el video [01:08:00] para evitar recargar)
    if ($result) {
        // Redirigir al archivo principal
        header("Location: ../Pages/departamentos.php?status=success_add");
        exit();
    } else {
        header("Location: ../Pages/departamentos.php?status=error_add");
        exit();
    }
}
// Asegúrate de cambiar la URL de redirección a la ruta de tu archivo principal si no es 'departamentos.php'
?>