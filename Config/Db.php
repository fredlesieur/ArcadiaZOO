<?php

namespace App\Config;

use PDO;

class Db extends PDO
{
    private static $instance;

    private const DBHOST = 'localhost';
    private const DBNAME = 'arcadia';
    private const DBUSER = 'root';
    private const DBPASS = 'root';

    private function __construct()
    {
        $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME;
        parent::__construct($dsn, self::DBUSER, self::DBPASS);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
