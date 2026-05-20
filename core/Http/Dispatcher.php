<?php

namespace Core\Http;

use ReflectionMethod;
use Core\Container\Container;
use Core\Repositories\ProductRepo;
use Core\Contracts\ProductRepositoryInterface;

class Dispatcher
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();

        $this->container->bind(
            ProductRepositoryInterface::class,
            ProductRepo::class
        );
    }

    public function dispatch(
        array $action,
        array $params = []
    )
    {
        [$controller, $method] = $action;

        $instance = $this->container->resolve(
            $controller
        );

        $reflection = new ReflectionMethod(
            $instance,
            $method
        );

        $dependencies = [];

        $routeParams = $params;

        foreach (
            $reflection->getParameters()
            as $parameter
        ) {

            $type = $parameter->getType();

            if (
                $type &&
                $type->isBuiltin()
            ) {

                $dependencies[] =
                    array_shift($routeParams);

                continue;
            }


            if ($type) {

                $className = $type->getName();

                $dependencies[] =
                    $this->container->resolve(
                        $className
                    );
            }
        }

        return $reflection->invokeArgs(
            $instance,
            $dependencies
        );
    }
}