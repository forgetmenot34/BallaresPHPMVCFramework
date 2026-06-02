<?php

namespace Core\Http;

class Response
{
    public function redirect(
        string $url
    ): void
    {
        header("Location: $url");

        exit;
    }

    public function alert(
        string $message
    ): void
    {
        echo "
        <script>
            alert('$message');
            window.history.back();
        </script>
        ";

        exit;
    }
}