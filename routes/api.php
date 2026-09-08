<?php

use App\Http\Controllers\TodoController;

$router = new class {
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function put(string $path, callable $handler): void
    {
        $this->routes['PUT'][$path] = $handler;
    }

    public function delete(string $path, callable $handler): void
    {
        $this->routes['DELETE'][$path] = $handler;
    }
};

$controller = new TodoController();

$router->get('/api/todos', [$controller, 'index']);
$router->post('/api/todos', [$controller, 'store']);
$router->get('/api/todos/{id}', [$controller, 'show']);
$router->put('/api/todos/{id}', [$controller, 'update']);
$router->delete('/api/todos/{id}', [$controller, 'destroy']);

return $router;
