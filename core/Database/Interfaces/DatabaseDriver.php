<?php

namespace Core\Database\Interfaces;

use PDO;

interface DatabaseDriver
{
    public function connect(array $config): PDO;
}
?>