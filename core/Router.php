<?php

namespace core\Router;
use app\Controller\HomeController;
class Router
{
    private $routes = [];
    public function get($path, $action)
    {
        $this->addRoute('GET', $path, $action);
    }

    // Enregistre une route POST
    public function post($path, $action)
    {
        $this->addRoute('POST', $path, $action);
    }

    // Méthode générique pour ajouter une route
    private function addRoute($method, $path, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action
        ];
    }

    // Méthode pour exécuter le routage
    public function run()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                // Vérifie si l'action est un tableau [Controller::class, 'method']
                if (is_array($route['action'])) {
                    $controllerName = $route['action'][0];
                    $method = $route['action'][1];

                    // Instancie le contrôleur et appelle la méthode
                    $controller = new $controllerName();
                    return $controller->$method();
                }
            }
        }
        // Si aucune route ne correspond, afficher une erreur 404
        http_response_code(404);
        echo "404 - Not Found";
    }
}
