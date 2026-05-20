<?php

namespace Core\View;

class Engine
{
    public static function render(
        string $view,
        array $data = []
    )
    {
        extract($data);

        require "../app/Views/{$view}.php";
    }
}