<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Servicios - DEPTEC</title>
  <link rel="stylesheet" href="../View/CSS/styles-servicios.css">
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="nav-left">
      <div class="logo">
        <img src="../Images/logDEP02.jpg" alt="DEPTEC Logo">
      </div>
      <h2>Servicios</h2>
    </div>

    <div class="nav-right">
      <div class="search-bar">
        <input type="text" placeholder="Buscar servicio..." aria-label="Buscar servicio">
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
        
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('../methods/conexion.php');

                $sql = "SELECT * FROM servicios";
                $result = $conectar->query($sql);

                if(!$result){
                    die("Query inválido: " . $conectar->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr data-id='" . $row["id_servicio"] . "'>
                            <td><input type='radio' name='seleccionServicio'></td>
                            <td>" . $row["Nombre"] . "</td>
                            <td>" . $row["Precio"] . "</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>

      </div>

      <div class="actions">
        <button class="btn brown" onclick="abrirModal('modalEditarServicio')"><i class="fa-solid fa-pen-to-square"></i> Editar</button>

        <button class="btn brown" id="btnEliminar">
          <i class="fa-solid fa-trash"></i> Eliminar
        </button>

        <button class="btn brown" onclick="abrirModal('modalAgregarServicio')"><i class="fa-solid fa-plus"></i> Agregar</button>
      </div>
    </section>

    <!-- IMAGEN DERECHA -->
    <aside class="side-image"></aside>
  </main>

  <!-- MODAL AGREGAR SERVICIO -->
  <div id="modalAgregarServicio" class="modal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <h3>Agregar Servicio</h3>

      <form action="../methods/insertar_ser.php" method="POST">
        <div class="inputs">
          <div class="input-group">
            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre" placeholder="Ej. Internet" required>
          </div>
          <div class="input-group small">
            <label for="Precio">Precio</label>
            <input type="number" id="Precio" name="Precio" placeholder="Ej. 1500" required>
          </div>
        </div>
        <div class="modal-actions">
          <button type="submit" class="btn brown"><i class="fa-solid fa-plus"></i> Agregar</button>
          <button type="button" class="btn black" onclick="cerrarModal('modalAgregarServicio')">
            <i class="fa-solid fa-right-from-bracket"></i> Volver
          </button>
        </div>
      </form>

    </div>
  </div>

  <!-- MODAL EDITAR SERVICIO -->
  <div id="modalEditarServicio" class="modal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <h3>Editar Servicio</h3>
      <form id="formEditarServicio">
        <div class="inputs">
          <div class="input-group">
            <label for="nombreEditarServicio">Nombre</label>
            <input type="text" id="nombreEditarServicio" value="Internet" required>
          </div>
          <div class="input-group small">
            <label for="precioEditarServicio">Precio</label>
            <input type="number" id="precioEditarServicio" value="1500" required>
          </div>
        </div>
        <div class="modal-actions">
          <button type="submit" class="btn brown"><i class="fa-solid fa-bookmark"></i> Guardar</button>
          <button type="button" class="btn black" onclick="cerrarModal('modalEditarServicio')"><i class="fa-solid fa-right-from-bracket"></i> Volver</button>
        </div>
      </form>
    </div>
  </div>

  <!-- SCRIPT -->
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
    document.getElementById('btnEliminar').addEventListener('click', function() {
  const filaSeleccionada = document.querySelector('input[name="seleccionServicio"]:checked');
  
  if (!filaSeleccionada) {
    alert('Por favor, selecciona un servicio para eliminar.');
    return;
  }

  const fila = filaSeleccionada.closest('tr');
  const id = fila.getAttribute('data-id');

  if (confirm('¿Estás seguro de eliminar el registro?')) {
    fetch('../methods/eliminar_ser.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
      if (data.trim() === 'OK') {
        fila.remove();
        alert('Registro eliminado correctamente.');
      } else {
        alert('Error al eliminar: ' + data);
      }
    })
    .catch(err => {
      alert('Error de conexión con el servidor.');
      console.error(err);
    });
  }
});
  </script>

</body>
</html>
