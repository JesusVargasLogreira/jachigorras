<?php
define('BASE_PATH', dirname(__DIR__));

// Autoload básico
spl_autoload_register(function($class) {
    include BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
});

// Routing básico
$controller = isset($_GET['c']) ? $_GET['c'] : 'home';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';

// Cargar controlador
$controllerName = ucfirst($controller) . 'Controller';
$controllerPath = BASE_PATH . '/controllers/' . $controllerName . '.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controller = new $controllerName();
    $controller->$action();
} else {
    echo "Controlador no encontrado";
}