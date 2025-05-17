
<?php
session_start();
require_once __DIR__ . '/../controllers/UsuarioController.php';
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Iniciar Sesión / Registro</title>
    <link rel="stylesheet" href="/public/css/logpagestyles.css">
    <script src="/public/js/auth.js"></script>

</head>
<body>
    <!-- Imagen de fondo-->
    <span>
        <img src="/public/img/Fondo.jpg" alt="Fondo del login" width="100%" height="100%">
    </span>
    <main class="container_log">
        <img src="/public/img/jachi_gorras_color_4.png" alt="logo JachiGorras" width="70%" height="40%" />

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- LOGIN -->
        <form id="login-form" class="login-form" action="/login" method="POST">
            <input type="text" id="login-name" name="username" required placeholder="Juan Pérez" />
            <input type="email" id="login-email" name="email" required placeholder="mail@example.com" />
            <input type="password" id="login-password" name="password" required placeholder="********" />
            <button type="submit">Iniciar Sesión</button>
            <p>¿No tienes cuenta? <a href="#" id="show-register">Regístrate</a></p>
        </form>

        <!-- REGISTRO -->
        <form id="register-form" action="/register" method="POST" style="display: none;">
            <input type="text" id="reg-name" name="username" required placeholder="Tu nombre" />
            <input type="email" id="reg-email" name="email" required placeholder="mail@example.com" />
            <input type="password" id="reg-password" name="password" required placeholder="********" />
            <button type="submit">Registrar</button>
            <p>¿Ya tienes cuenta? <a href="#" id="show-login">Inicia Sesión</a></p>
        </form>
    </main>

    <script>
        document.getElementById('show-register').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        });

        document.getElementById('show-login').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        });
    </script>
</body>
</html>