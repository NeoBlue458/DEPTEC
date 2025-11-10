<?php
// 3. Lógica del botón ELIMINAR (Confirmación y Redirección)
$('#btnEliminar').on('click', function() {
    if (!idSeleccionado) {
        alert('Por favor, selecciona una fila primero.');
        return;
    }

    // Pedir Confirmación (¡crucial antes de eliminar!)
    if (confirm('¿Está seguro de que desea eliminar el registro seleccionado (ID: ' + idSeleccionado + ')?')) {
        
        // **ACCIÓN CLAVE: Redireccionar al script PHP, pasando el ID por GET (URL)**
        // Asegúrate de que 'id=' coincide con lo que tu PHP espera ($_GET['id'])
        window.location.href = 'eliminar_departamento.php?id=' + idSeleccionado;

    }
});
?>