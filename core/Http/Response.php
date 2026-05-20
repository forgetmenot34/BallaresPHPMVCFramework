<?php

namespace Core\Http;

class Response
{
    public function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}