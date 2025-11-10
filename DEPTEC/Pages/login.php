<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión - DEPTEC</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="../View/CSS/styles-login.css">
</head>
<body>

  <!-- CONTENEDOR PRINCIPAL -->
  <div class="login-container">
    <div class="login-box">
      <!-- Logo Superior -->
      <div class="logo">
        <img src="../Images/logDEP02.jpg" alt="DEPTEC Logo">

      </div>

      <!-- Bienvenida -->
      <h2>Bienvenido a<br><span>DEPTEC</span></h2>

      <!-- Imagen de usuario -->
      <div class="user-img">
        <img src="../Images/usuimg.png" alt="Usuario">
      </div>

      <!-- Campos de inicio -->
      <form>
        <div class="input-group">
          <label>Nombre</label>
          <input type="text" placeholder="Usuario_Prueba">
        </div>

        <div class="input-group">
          <label>Contraseña</label>
          <input type="password" placeholder="xxxxx">
        </div>

        <div class="options">

          <button type="button" class="btn brown" onclick="window.location.href='../index.php'">
            <i class="fa-solid fa-arrow-right"></i> Ingresar
          </button>

        </div>
      </form>
    </div>
  </div>

</body>
</html>
