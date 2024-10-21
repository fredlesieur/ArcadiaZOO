<?php

namespace App\Config;

use MongoDB\Client;

class MongoDb
{
    protected $client;

    public function __construct()
    {
        $this->client = $this->connect();
    }

    /**
     * connexion à la base de données MongoDB
     *
     * @return Client retourne une instance de la classe Client
     */
    protected function connect(): Client
    {
        try {
            // Connect to MongoDB Atlas via the URI
            return new Client($_ENV['MONGODB_URI']);
        } catch (\Exception $e) {
            // Lance une exception au lieu de terminer le script
            throw new \RuntimeException("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    /**
     * Récupère une collection spécifique de la base de données.
     *
     * @param string 
     * @param string 
     * @return Collection retourne une instance de la classe Collection
     */
    public function getCollection(string $database, string $collection)
    {
        return $this->client->$database->$collection;
    }
}
