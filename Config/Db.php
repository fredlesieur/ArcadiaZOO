<?php

namespace App\config;

use PDO;

class Db extends PDO {

    private static $instance;

 // Constructeur pour initialiser la connexion à la base de données
    private function __construct()
    {
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
        parent::__construct($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

   // Singleton
    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
