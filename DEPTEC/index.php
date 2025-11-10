<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Inicio - DEPTEC</title>
  <link rel="stylesheet" href="View/CSS/styles-index.css">
</head>
<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="nav-left">
      <div class="logo">
        <img src="Images/logDEP02.jpg" alt="DEPTEC Logo">
      </div>
      <h2>Inicio</h2>
    </div>
    <div class="nav-right">
          <button type="button" class="btn black" onclick="window.location.href='Images/login.php'">
            <i class="fa-solid fa-arrow-left"></i> Salir
          </button>
    </div>
  </header>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="main-layout">
    <!-- IMAGEN IZQUIERDA -->
    <aside class="side-image"></aside>

    <!-- PANEL DERECHO -->
    <section class="panel">
      <h2>¡Hola de nuevo!</h2>

      <div class="menu-buttons">
        <div class="row">
          <button class="btn brown" onclick="window.location.href='Pages/departamentos.php'"><i class="fa-solid fa-house"></i> Departamentos</button>
          <button class="btn brown" onclick="window.location.href='Pages/inquilinos.php'"><i class="fa-solid fa-users"></i> Inquilinos</button>
        </div>
        <div class="row">
          <button class="btn brown" onclick="window.location.href='Pages/servicios.php'"><i class="fa-solid fa-gear"></i> Servicios</button>
          <button class="btn brown" onclick="window.location.href='Pages/alquila.php'"><i class="fa-solid fa-file-contract"></i> Alquila</button>
        </div>
        <div class="row">
          <button class="btn brown" onclick="window.location.href='Pages/recibos.php'"><i class="fa-solid fa-receipt"></i> Recibos</button>
          <button class="btn brown" onclick="window.location.href='Pages/usuarios.php'"><i class="fa-solid fa-user"></i> Usuarios</button>
        </div>
      </div>

      <h3 class="subtitle">Las rentas más cercanas a cobrar</h3>

      <!-- TABLA -->
      <div class="table-area">
        <table>
            <!-- Aqui la info de la tabla -->
        </table>
      </div>
    </section>
  </main>
</body>
</html>
