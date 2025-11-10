<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquilinos - DEPTEC</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="../View/CSS/styles-inquilinos.css">
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="nav-left">
      <div class="logo">
        <img src="../Images/logDEP02.jpg" alt="DEPTEC Logo">
      </div>
      <h2>Inquilinos</h2>
    </div>

    <div class="nav-right">
      <div class="search-bar">
        <input type="text" placeholder="Buscar inquilino..." aria-label="Buscar inquilino">
        <button class="btn brown" aria-label="Buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
      <button class="btn brown"><i class="fa-solid fa-list" aria-hidden="true"></i> Categoría</button>
      <button class="btn black" onclick="window.location.href='../index.php'">
        <i class="fa-solid fa-right-from-bracket"></i> Volver
      </button>
    </div>
  </header>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="main-layout">
    <section class="panel">
      <div class="table-area">
        <!-- Aquí se mostrarán los registros de inquilinos -->
      </div>

      <div class="actions">
        <button class="btn brown" onclick="abrirModal('modalAgregar')">
          <i class="fa-solid fa-plus"></i> Agregar
        </button>

        <button class="btn brown" onclick="abrirModal('modalEditar')">
          <i class="fa-solid fa-pen-to-square"></i> Editar
        </button>

        <button class="btn brown">
          <i class="fa-solid fa-trash"></i> Eliminar
        </button>
      </div>
    </section>

    <!-- IMAGEN DERECHA -->
    <aside class="side-image"></aside>
  </main>

  <!-- MODAL AGREGAR -->
  <div id="modalAgregar" class="modal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <h3>Agregar Inquilino</h3>
      <form id="formAgregar">
        <div class="inputs">
          <div class="input-group">
            <label for="nombreAgregar">Nombre</label>
            <input type="text" id="nombreAgregar" name="nombre" placeholder="Ej. Juan Pérez" required>
          </div>

          <div class="input-row">
            <div class="input-group">
              <label for="telefonoAgregar">Teléfono</label>
              <input type="text" id="telefonoAgregar" name="telefono" placeholder="Ej. 1234567890" required>
            </div>
            <div class="input-group">
              <label for="tutorAgregar">Teléfono Tutor</label>
              <input type="text" id="tutorAgregar" name="tutor" placeholder="Ej. 0987654321" required>
            </div>
          </div>

          <div class="input-row">
            <div class="input-group">
              <label for="apellidoPaternoAgregar">Apellido Paterno</label>
              <input type="text" id="apellidoPaternoAgregar" name="apellidoPaterno" placeholder="Ej. López" required>
            </div>
            <div class="input-group">
              <label for="apellidoMaternoAgregar">Apellido Materno</label>
              <input type="text" id="apellidoMaternoAgregar" name="apellidoMaterno" placeholder="Ej. García">
            </div>
          </div>

          <div class="upload-row">
            <button type="button" class="btn brown small">
            <input type="file" id="credencial" style="display:none;">
            <label for="credencial" class="btn brown small">
              <i class="fa-solid fa-camera"></i> Credencial
            </label>
            </button>
          </div>
        </div>

        <div class="modal-actions">
          <button type="submit" class="btn brown"><i class="fa-solid fa-plus"></i> Agregar</button>
          <button type="button" class="btn black" onclick="cerrarModal('modalAgregar')">
            <i class="fa-solid fa-right-from-bracket"></i> Volver
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL EDITAR -->
  <div id="modalEditar" class="modal" role="dialog" aria-modal="true">
    <div class="modal-content">
      <h3>Editar Inquilino</h3>
      <form id="formEditar">
        <div class="inputs">
          <div class="input-group">
            <label for="nombreEditar">Nombre</label>
            <input type="text" id="nombreEditar" name="nombre" value="Juan Pérez" required>
          </div>

          <div class="input-row">
            <div class="input-group">
              <label for="telefonoEditar">Teléfono</label>
              <input type="text" id="telefonoEditar" name="telefono" value="1234567890" required>
            </div>
            <div class="input-group">
              <label for="tutorEditar">Teléfono Tutor</label>
              <input type="text" id="tutorEditar" name="tutor" value="0987654321" required>
            </div>
          </div>

          <div class="input-row">
            <div class="input-group">
              <label for="apellidoPaternoEditar">Apellido Paterno</label>
              <input type="text" id="apellidoPaternoEditar" name="apellidoPaterno" value="López" required>
            </div>
            <div class="input-group">
              <label for="apellidoMaternoEditar">Apellido Materno</label>
              <input type="text" id="apellidoMaternoEditar" name="apellidoMaterno" value="García">
            </div>
          </div>
        </div>

        <div class="modal-actions">
          <button type="submit" class="btn brown"><i class="fa-solid fa-bookmark"></i> Guardar</button>
          <button type="button" class="btn black" onclick="cerrarModal('modalEditar')">
            <i class="fa-solid fa-right-from-bracket"></i> Volver
          </button>
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

    // Previene recarga en formularios
    document.querySelectorAll('form').forEach(f => {
      f.addEventListener('submit', e => e.preventDefault());
    });
  </script>

</body>
</html>
