<?php

namespace App\Controllers;

use MongoDB\Driver\Manager;
use MongoDB\Driver\Command;
use Exception;

class TestMongoController extends Controller {
    public function index() {
        try {
            // Utilisation correcte de la classe Manager
            $manager = new Manager("mongodb://localhost:27017");
            echo "Connexion MongoDB réussie.";
        } catch (Exception $e) {
            echo "Erreur de connexion : ", $e->getMessage();
        }
    }
}