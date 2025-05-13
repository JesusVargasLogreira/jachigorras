<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar Sesión / Registro</title>
  <link rel="stylesheet" href="../../css/logpagestyles.css">
</head>
<body>
     <!-- Imagen de fondo-->
      <span>
        <img src="../../../IMG/Fondo.jpg" alt="Fondo del login" width="100%" height="100%">
        
      </span>
  <main class="container_log">
    <img src="../../../IMG/jachi_gorras_color_4.png" alt="logo JachiGorras" width="70%" height="40%" />

    <!-- LOGIN -->
    <form id="login-form" class="login-form">
      <input type="text" id="login-name" name="login-name" required placeholder="Juan Pérez" />
      <input type="email" id="login-email" name="login-email" required placeholder="mail@example.com" />
      <input type="password" id="login-password" name="login-password" required placeholder="********" />
      <button type="submit">Iniciar Sesión</button>
      <p>¿No tienes cuenta? <a href="#" id="show-register">Regístrate</a></p>
    </form>

    <!-- REGISTRO -->
    <form id="register-form" style="display: none;">
      <input type="text" id="reg-name" name="reg-name" required placeholder="Tu nombre" />
      <input type="email" id="reg-email" name="reg-email" required placeholder="mail@example.com" />
      <input type="number" id="reg-number" name="reg-number" required placeholder="Tu edad" />
      <input type="password" id="reg-password" name="reg-password" required placeholder="********" />
      <button type="submit">Registrar</button>
      <p style="display: none;">¿Ya tienes cuenta? <a href="#" id="show-login">Inicia Sesión</a></p>
    </form>
    
  </main>

  <script src="../../js/transitionlog.js"></script>

</body>
</html>