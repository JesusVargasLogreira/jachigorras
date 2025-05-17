<?php
<?php
class Router {
    private $routes = [];

    public function addRoute($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function handleRequest() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestPath) {
                $controller = new $route['controller']();
                return $controller->{$route['action']}();
            }
        }

        // Si no se encuentra la ruta
        header("HTTP/1.0 404 Not Found");
        echo "Ruta no encontrada";
    }
}