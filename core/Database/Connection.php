<?php

namespace Core\Database;

use PDO;
use Core\Database\Drivers\MySQLDriver;

class Connection
{
    public static function connect(): PDO
    {
        $config = require __DIR__ . "/../../config/database.php";

        $driver = new MySQLDriver();

        return $driver->connect($config);
    }
}
?>