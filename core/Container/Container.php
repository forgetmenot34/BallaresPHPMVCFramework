<?php

namespace Core\Container;

use ReflectionClass;

class Container
{
    private array $bindings = [];

    public function bind(
        string $abstract,
        string $concrete
    ): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function resolve(string $class)
    {
        if (isset($this->bindings[$class])) {
            $class = $this->bindings[$class];
        }

        $reflection = new ReflectionClass($class);

        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $class();
        }

        $dependencies = [];

        foreach ($constructor->getParameters() as $parameter) {

            $type = $parameter->getType();

            $dependencies[] = $this->resolve(
                $type->getName()
            );
        }

        return $reflection->newInstanceArgs(
            $dependencies
        );
    }
}
?>