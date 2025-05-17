
<?php
require_once __DIR__ . '/../config/routes.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/CarritoController.php';
require_once __DIR__ . '/../config/database.php';

//Inicializar controladores
$database = new Database();
$db = $database->getConnection();
$productController = new ProductController($db);
$cartController = new CartController($db);

// Iniciar sesión para el carrito
session_start();

// Obtener productos y carrito
$featuredProducts = $productController->getFeatured();
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart']->getItems() : [];

$router = new Router();

// Rutas de autenticación
$router->addRoute('GET', '/views/Register.php', 'UserController', 'showRegisterForm');
$router->addRoute('POST', '/login', 'UserController', 'login');
$router->addRoute('POST', '/register', 'UserController', 'register');
$router->addRoute('GET', '/logout', 'UserController', 'logout');

// Rutas principales
$router->addRoute('GET', '/', 'ProductController', 'index');
$router->addRoute('GET', '/about', 'ProductController', 'about');

// Rutas del carrito
$router->addRoute('POST', '/cart/add', 'CartController', 'addToCart');
$router->addRoute('POST', '/cart/update', 'CartController', 'updateCart');
$router->addRoute('POST', '/cart/remove', 'CartController', 'removeFromCart');

// Manejar la solicitud
$router->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las JachiGorras</title>
    <link rel="stylesheet" href="/public/css/index.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vincular JS -->
    <script src="/public/js/index.js"></script>
    <script src="/public/js/carrito.js"></script>
</head>

<body>
    <div class="Caja_Negro">
        <div class="Menu">
            <nav class="Menu1">
                <ul>
                    <li class="titulo"><img src="/public/img/jachi_gorras_color_4.png" alt="" width="70px" height="70px"></li>
                    <li><span class="iconos">
                            <ion-icon name="globe-outline"></ion-icon>
                        </span>
                        <input type="text" placeholder="www.jachi-gorras.com"><span class="iconos1"><ion-icon
                                name="mic-outline"></ion-icon></span>
                    </li>
                    <li class="tamaño"><a href="#">Tienda</a></li>
                    <li class="tamaño"><a href="/about/Acerca.php">Acerca de nosotros</a> </li>
                    <li class="tamaño1">
                        <a href="#" class="carrito-icon">
                            <ion-icon name="cart-outline"></ion-icon>
                            <?php if(!empty($cartItems)): ?>
                                <span class="cart-count"><?php echo count($cartItems); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="tamaño1 usuario-menu">
                        <a href="#" class="usuario-icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </a>
                        <ul class="submenu-usuario">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <li class="usuario-nombre">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></li>
                                <li><a href="/logout">Cerrar Sesión</a></li>
                            <?php else: ?>
                                <li><a href="/views/Register.php">Iniciar Sesión / Registrarse</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                        <ul>
                            <li>
                                <!-- Carrito de Compras -->
                                <div class="carrito">
                                    <!-- Encabezado del Carrito -->
                                    <div class="header-carrito">
                                        <h2 class="titulo-carrito"><a href="">Tu carrito</a></h2>
                                    </div>
                                    <!-- Productos en el Carrito -->
                                    <div class="carrito-prods">
                                        <?php if(!empty($cartItems)): ?>
                                            <?php foreach($cartItems as $item): ?>
                                                <div class="car-prod">
                                                    <img src="/public/img/<?php echo htmlspecialchars($item['product']['image']); ?>" alt="" width="80px">
                                                    <div class="car-prod-detalles">
                                                        <span class="car-prod-titulo"><?php echo htmlspecialchars($item['product']['name']); ?></span>
                                                        <div class="selector-cantidad">
                                                            <i class="fa-solid fa-minus restar-can" data-id="<?php echo $item['product']['id']; ?>"></i>
                                                            <input type="text" value="<?php echo $item['quantity']; ?>" class="carProdCantidad" disabled>
                                                            <i class="fa-solid fa-plus sumar-can" data-id="<?php echo $item['product']['id']; ?>"></i>
                                                        </div>
                                                        <span class="carrito-prod-precio">$<?php echo number_format($item['product']['price'], 0, ',', '.'); ?></span>
                                                    </div>
                                                    <span class="boton-eliminar" data-id="<?php echo $item['product']['id']; ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="carrito-vacio">Tu carrito está vacío</p>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Total del Carrito -->
                                    <div class="car-total">
                                        <div class="fila">
                                            <strong>Tu Total</strong>
                                            <span class="car-prec-total">
                                                $<?php echo number_format($cartController->cart->getTotal(), 0, ',', '.'); ?>
                                            </span>
                                        </div>
                                        <?php if(!empty($cartItems)): ?>
                                            <button class="boton-pagar">Pagar <i class="fa-solid fa-dollar-sign"></i></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
            </nav>
        <div class="Caja_Contenido">
        <div class="columnas3">
            <img class="fondo" src="/public/img/4.png" alt="">
            <img class="gorra" src="/public/img/OIP-removebg-preview.png" alt="">
            <img class="blanca" src="/public/img/gorra.blanca-removebg-preview.png" alt="">
            <img class="negra" src="/public/img/gorra.negra-removebg-preview.png" alt="">
            <h1>Descripción</h1>
            <p class="texto">Nuestras gorras podrían destacar por <br> diseños modernos y versátiles. Con <br>un gran
                estilo, comodidad y funcionalidad.</p>
        </div>
    </div>
    <!-- Productos Destacados -->
    <h2 class="titulo-catalogo">Nuevas Gorras</h2>
    <section class="contenedor">
        <div class="contenedor-productos">
            <?php foreach($featuredProducts as $product): ?>
                <div class="producto">
                    <span class="nombre-gorra"><?php echo htmlspecialchars($product['name']); ?></span>
                    <img src="/public/img/<?php echo htmlspecialchars($product['image']); ?>" class="img-item">
                    <span class="precio">$<?php echo number_format($product['price'], 0, ',', '.'); ?></span>
                    <button class="boton-carrito" data-id="<?php echo $product['id']; ?>">
                        Agregar al Carrito
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!--pagina de los iconos seleccionados-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<footer>
    <!-- Columna 3: Contacto -->
        <div class="footer-column">
            <h3>Contacto</h3>
            <ul>
                <li>300 507 10 00</li>
                <li>PBX: 01 8000 41 37 57</li>
            </ul>
        </div>

        <!-- Logotipo y redes sociales -->
        <div class="footer-logo-socials">
            <h2>JACHIGORRAS</h2>
            <div class="social-icons">
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>

</footer>
</html>
