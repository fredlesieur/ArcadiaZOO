<?php
namespace App\config;

use PDO;

class Db extends PDO {

    private static $instance;

    private function __construct()
    {
        // Vérification des variables d'environnement pour la production
        $host = getenv('DB_HOST');
        $dbName = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');

        // Si les variables d'environnement ne sont pas définies, utiliser les valeurs par défaut pour le développement local
        if ($host === false || $dbName === false || $user === false || $pass === false) {
            $host = 'localhost';
            $dbName = 'arcadia';
            $user = 'root';
            $pass = 'root';
        }

        $dsn = "mysql:host=$host;dbname=$dbName";
        parent::__construct($dsn, $user, $pass);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): self 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

