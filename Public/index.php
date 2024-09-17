<?php

use App\Autoloader;
use App\Config\Main;

// Définir la constante ROOT pour la racine du projet
define('ROOT', dirname(__DIR__));

// Inclure l'autoloader
require_once ROOT . '/Autoloader.php';

// Enregistrer l'autoloader
Autoloader::register();

// Démarrer l'application
$router = new Main;
$router->start();
