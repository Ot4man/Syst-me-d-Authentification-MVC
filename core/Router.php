<?php

class Router
{
    private array $routes = [];

    // Register a route
    public function add(string $method, string $path, array $action, bool $protected = false)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => trim($path, '/'),
            'controller' => $action[0],
            'action' => $action[1],
            'protected' => $protected
        ];
    }

    // Dispatch the request
    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        foreach ($this->routes as $route) {
            if (
                $route['method'] === $requestMethod &&
                $route['path'] === $requestUri
            ) {
                // Check protected route
                if ($route['protected'] && empty($_SESSION['user'])) {
                    header('Location: /login');
                    exit;
                }

                $controller = new $route['controller'];
                $method = $route['action'];
                $controller->$method();
                return;
            }
        }

        http_response_code(404);
        echo "404 - Page not found";
    }
}
