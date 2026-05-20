<?php

namespace Core\Http;

use Core\Http\Dispatcher;

class Router
{
    private array $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][] = [
            'uri' => $uri,
            'action' => $action
        ];
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][] = [
            'uri' => $uri,
            'action' => $action
        ];
    }

    public function dispatch($uri, $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        $routes = $this->routes[$method] ?? [];

        foreach ($routes as $route) {

            $pattern = preg_replace(
                '#\{[a-zA-Z_]+\}#',
                '([0-9]+)',
                $route['uri']
            );

            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches);

                $dispatcher = new Dispatcher();

                return $dispatcher->dispatch(
                    $route['action'],
                    $matches
                );
            }
        }

        die("Route not found");
    }
}