<?php

namespace Core\Database\Drivers;

use PDO;
use Core\Database\Interfaces\DatabaseDriver;

class MySQLDriver implements DatabaseDriver
{
    public function connect(array $config): PDO
    {
        return new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']}",
            $config['username'],
            $config['password']
        );
    }
}
?>