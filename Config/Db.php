<?php

namespace App\config;

use PDO;

class Db extends PDO {

    private static $instance;

    // Constructeur pour initialiser la connexion à la base de données
    private function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=arcadia';
        parent::__construct($dsn, 'root', 'root');
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
