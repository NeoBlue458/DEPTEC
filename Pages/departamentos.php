<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Departamentos - DEPTEC</title>
  <link rel="stylesheet" href="../View/CSS/styles-departamentos.css">
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="nav-left">
      <div class="logo">
        <img src="../Images/logDEP02.jpg" alt="DEPTEC Logo">
      </div>
      <h2>Departamentos</h2>
    </div>

    <div class="nav-right">
      <div class="search-bar">
        <input type="text" class="light-table-filter" placeholder="Buscar departamento..." aria-label="Buscar departamento" data-table="table_id">
        <button class="btn brown" aria-label="Buscar"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
      </div>
      <button class="btn brown"><i class="fa-solid fa-list" aria-hidden="true"></i> Categoría</button>
      <button class="btn black" onclick="window.location.href='../index.php'">
        <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Volver
      </button>
    </div>
  </header>

  <!-- CONTENIDO -->
  <main class="main-layout">
    <section class="panel">
      <div class="table-area">
        <!-- Aquí va la tabla de departamentos -->
         <table  class="table table-striped table-dark table_id ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Amueblado</th>
              <th>Precio</th>
              <th>Acción</th>
            </tr>
          </thead>
         <tbody>
          
<?php
// Incluye la nueva clase de departamentos
include '../clases/c_departamentos.php';

// Obtener los datos usando la nueva función
$datos = C_Departamentos::MostrarDepartamentos();

if (!empty($datos)) {
?>
    <?php
  
    foreach ($datos as $fila) { 
    ?>
        <tr class="fila-departamento" data-id="<?php echo $fila['id_departamento']; ?>">
            <td><?php echo $fila['id_departamento']; ?></td>
            <td><?php echo $fila['nombre_D']; ?></td>
            <td><?php echo $fila['amueblado']; ?></td>
            <td><?php echo number_format($fila['precio'], 2); ?></td>
            <td>
            <button type="button" class="btn btn-sm btn-info seleccionar-btn" data-id="<?php echo $fila['id_departamento']; ?>">
            Seleccionar
            </button>
            </td>
            </tr> 
          <?php
          } 
          ?>
          <?php
          } else {
          ?>
          <tr>
              <td colspan="5" style="text-align: center; color: #f8d7da; background-color: #721c24; padding: 10px; font-weight: bold;">
              ⚠️ No se encontraron registros de departamentos.
              </td>
          </tr>
          <?php
          }
          ?>
          </tbody> </table>

<?php
// Cierra la conexión a la base de datos
if (isset($conectar)) {
    mysqli_close($conectar); 
}
?>
      </div>

      <div class="actions">
        
        <button class="btn brown" onclick="abrirModal('modalAgregar')">
          <i class="fa-solid fa-plus" aria-hidden="true"></i> Agregar
        </button>
        <button class="btn brown" id="btnEditar" onclick="abrirModal('modalEditar')" >
         <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i> Editar
       </button>

         <button class="btn brown" id="btnEliminar" >
          <i class="fa-solid fa-trash" aria-hidden="true"></i> Eliminar
         </button>
        </div>
      </div>
    </section>

    <!-- IMAGEN DERECHA -->
    <aside class="side-image">
      
    </aside>
  </main>

  <!-- MODAL AGREGAR -->
  <div id="modalAgregar" class="modal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <h3>Agregar Departamento</h3>

      <form action="../methods/insert_departamentos.php" method="POST" id="formAgregar">
        <div class="inputs">
          <div class="input-group">
            <label for="nombreAgregar">Nombre</label>
            <input type="text" id="nombreAgregar" name="nombre" placeholder="Ej. Departamento 1" required>
          </div>

          <div class="input-group small">
            <label for="precioAgregar">Precio</label>
            <input type="number" id="precioAgregar" name="precio" placeholder="Ej. 1000" required>
          </div>

          <div class="checkbox-group">
              <input type="checkbox" id="roperoAgregar" name="muebles[]" value="Ropero">
              <label for="roperoAgregar">Ropero</label>

              <input type="checkbox" id="camaAgregar" name="muebles[]" value="Base de Cama">
              <label for="camaAgregar">Base de Cama</label>
              <input type="checkbox" id="sillonAgregar" name="muebles[]" value="Sillón">
              <label for="sillonAgregar">Sillón</label>

              <input type="checkbox" id="mesaAgregar" name="muebles[]" value="Mesa de Noche">
              <label for="mesaAgregar">Mesa de Noche</label>
              </div>
        </div>

        <div class="modal-actions">
          <button type="submit" class="btn brown"><i class="fa-solid fa-plus" aria-hidden="true"></i> Agregar</button>
          <button type="button" class="btn black" onclick="cerrarModal('modalAgregar')">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Volver
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL EDITAR -->
  <div id="modalEditar" class="modal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <h3>Editar Departamento</h3>

      <form action="update_departamentos.php" id="formEditar">
        <input type="hidden" id="idEditar" name="id" value="">
        <div class="inputs">
          <div class="input-group">
            <label for="nombreEditar">Nombre</label>
            <input type="text" id="nombreEditar" name="nombre" value="Departamento 1" required>
          </div>

          <div class="input-group small">
            <label for="precioEditar">Precio</label>
            <input type="number" id="precioEditar" name="precio" value="1000" required>
          </div>

          <div class="checkbox-group">
            <input type="checkbox" id="roperoEdit" name="muebles[]" value="Ropero">
            <label for="roperoEdit">Ropero</label>

            <input type="checkbox" id="camaEdit" name="muebles[]" value="Base de Cama">
            <label for="camaEdit">Base de Cama</label>

            <input type="checkbox" id="sillonEdit" name="muebles[]" value="Sillón">
            <label for="sillonEdit">Sillón</label>

            <input type="checkbox" id="mesaEdit" name="muebles[]" value="Mesa de Noche">
            <label for="mesaEdit">Mesa de Noche</label>
          </div>
        </div>

        <div class="modal-actions">
          <button type="submit" class="btn brown"><i class="fa-solid fa-bookmark" aria-hidden="true"></i> Guardar</button>
          <button type="button" class="btn black" onclick="cerrarModal('modalEditar')">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Volver
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- SCRIPT -->
<script src="../Script/buscador.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script>
    function abrirModal(id) {
      const modal = document.getElementById(id);
      modal.style.display = 'flex';
      setTimeout(() => modal.classList.add('visible'), 10);
    }

    function cerrarModal(id) {
      const modal = document.getElementById(id);
      modal.classList.remove('visible');
      setTimeout(() => modal.style.display = 'none', 300);
    }

    $(document).ready(function() {
      // ⚠️ Deshabilitar botones al inicio
      $('#btnEditar').prop('disabled', true);
      $('#btnEliminar').prop('disabled', true);
      
      let idSeleccionado = null; // Variable global para el ID seleccionado

      // 1. Manejo de la SELECCIÓN de Fila (al hacer click en la fila o el botón)
      $('body').on('click', '.fila-departamento, .seleccionar-btn', function() {
        const row = $(this).closest('.fila-departamento');
        
        // A. Deseleccionar y limpiar el estilo de las demás filas
        $('.fila-departamento').removeClass('table-info');

        // B. Seleccionar visualmente la fila actual
        row.addClass('table-info');

        // C. Capturar el ID del departamento
        idSeleccionado = row.data('id');

        // D. Habilitar los botones de acción
        $('#btnEditar').prop('disabled', false);
        $('#btnEliminar').prop('disabled', false);
      });

      // 2. Lógica del botón EDITAR (Carga de datos y apertura de modal)
      $('#btnEditar').on('click', function() {
        if (!idSeleccionado) return;

        // **Paso AJAX para EDITAR: Obtener los datos del registro**
        $.ajax({
          url: '../methods/obtener_registro.php', // El script que creamos
          type: 'POST',
          data: { id: idSeleccionado },
          dataType: 'json',
          success: function(response) {
            if (response.success && response.data) {
              const data = response.data;
              
              // Llenar el formulario de Edición
              $('#formEditar #idEditar').val(data.id_departamento);
              $('#formEditar #nombreEditar').val(data.nombre_D);
              $('#formEditar #precioEditar').val(data.precio);
              
              // Llenar Checkboxes (Amueblado)
              const mueblesSeleccionados = data.amueblado ? data.amueblado.split(', ') : [];
              $('#formEditar input[name="muebles[]"]').prop('checked', false); // Limpiar primero
              mueblesSeleccionados.forEach(function(mueble) {
                // Marcar los checkboxes cuyos valores coincidan
                $(`#formEditar input[name="muebles[]"][value="${mueble}"]`).prop('checked', true);
              });

              // Abrir el modal después de cargar los datos
              abrirModal('modalEditar'); 
            } else {
              alert('Error al cargar los datos: ' + response.message);
            }
          },
          error: function() {
            alert('Error en la comunicación con el servidor al cargar datos.');
          }
        });
      });

      // 3. Lógica del botón ELIMINAR (Confirmación y AJAX)
      $('#btnEliminar').on('click', function() {
        if (!idSeleccionado) return;

        // **Paso de Confirmación**
        if (confirm(`¿Está seguro de que desea eliminar el departamento con ID: ${idSeleccionado}? Esta acción es irreversible.`)) {
          
          // **Paso AJAX para ELIMINAR**
          $.ajax({
            url: '../methods/delete_departamentos.php', // El script que creamos
            type: 'POST',
            data: { id: idSeleccionado },
            dataType: 'json',
            success: function(response) {
              if (response.success) {
                alert('Departamento eliminado con éxito.');
                
                // Eliminar la fila de la tabla (sin recargar)
                $('tr[data-id="' + idSeleccionado + '"]').remove();
                
                // Resetear el estado de la aplicación
                idSeleccionado = null;
                $('#btnEditar').prop('disabled', true);
                $('#btnEliminar').prop('disabled', true);
              } else {
                alert('Error al eliminar: ' + response.message);
              }
            },
            error: function() {
              alert('Error en la comunicación con el servidor al intentar eliminar.');
            }
          });
        }
      });
      
      // 4. Manejo del Submit del formulario de Edición
      $('#formEditar').on('submit', function(e) {
        e.preventDefault();
        
        // Recoger todos los datos del formulario de edición (incluyendo checkboxes)
        let formData = $(this).serialize();
        
        // Incluir el ID para la actualización
        formData += '&id=' + $('#idEditar').val(); 
        
        $.ajax({
          url: '../methods/update_departamentos.php', // Asume que este script también manejará la lógica de UPDATE
          type: 'POST',
          data: formData,
          dataType: 'json',
          success: function(response) {
            // Si la respuesta del PHP es exitosa
                if (response.success) {
                    alert('Departamento modificado con éxito.');
                    cerrarModal('modalEditar');
                    
                    // --- ✨ ACTUALIZACIÓN DINÁMICA DE LA TABLA ---
                    
                    // 1. Obtenemos los datos actualizados desde la respuesta
                    // (Usamos response.data, que definimos en el PHP)
                    const idActualizado = response.data.id;
                    const nombreActualizado = response.data.nombre;
                    const precioActualizado = parseFloat(response.data.precio).toFixed(2);
                    const amuebladoActualizado = response.data.amueblado;

                    // 2. Encontrar la fila (tr) en la tabla usando el data-id
                    const $fila = $('tr[data-id="' + idActualizado + '"]');
                    
                    // 3. Actualizar el contenido de las celdas (td)
                    if ($fila.length) {
                        // .eq(n) selecciona la celda por su índice (0=Id, 1=Nombre, 2=Amueblado, 3=Precio)
                        $fila.find('td').eq(1).text(nombreActualizado); 
                        $fila.find('td').eq(2).text(amuebladoActualizado);
                        $fila.find('td').eq(3).text(precioActualizado);
                    }
                    
                    // 4. Resetear el estado de la aplicación
                    idSeleccionado = null;
                    $fila.removeClass('table-info'); // Quitar la selección visual
                    $('#btnEditar').prop('disabled', true);
                    $('#btnEliminar').prop('disabled', true);

                } else {
                    // Si el PHP devolvió 'success: false'
                    alert('Error al modificar: ' + (response.message || 'Error desconocido.'));
                }
            
          },
          error: function() {
            alert('Error al modificar el departamento.');
          }
        });
      });
    });
  </script>

</body>
</html>
