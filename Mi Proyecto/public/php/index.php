<?php
<?php
require_once __DIR__ . '/config/routes.php';
require_once __DIR__ . '/config/database.php';

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

$router->handleRequest();