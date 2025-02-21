<?php 
namespace App\config;

use PDO;

/**
 * Classe Db pour gérer la connexion à la base de données en utilisant le pattern Singleton.
 * Elle empêche la création multiple d'instances de connexion pour optimiser les performances.
 */
class Db extends PDO {

    /**
     * Instance unique de la connexion PDO (Singleton).
     * @var self|null
     */
    private static $instance;

    /**
     * Constructeur privé pour empêcher l'instanciation directe de la classe.
     * La connexion est établie avec les paramètres définis dans le fichier .env.
     */
    private function __construct()
    {
        // Création de la chaîne de connexion (DSN) en utilisant les variables d'environnement
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];

        // Appel du constructeur de la classe parent (PDO) avec les informations d'identification
        parent::__construct($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);

        // Définition du mode de récupération des résultats : tableau associatif
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Activation du mode exception pour signaler les erreurs SQL
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /**
     * Méthode statique pour obtenir l'instance unique de la connexion.
     * Si aucune instance n'existe, elle est créée.
     * 
     * @return self Instance unique de la connexion PDO
     */
    public static function getInstance(): self 
    {
        // Vérifier si l'instance unique n'existe pas encore
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
