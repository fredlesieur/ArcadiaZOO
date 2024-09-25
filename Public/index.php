<?php

use App\Autoloader;
use App\Config\Main;

// Définir la constante ROOT pour la racine du projet
define('ROOT', dirname(__DIR__));

// Inclure l'autoloader de Composer
require_once ROOT . '/vendor/autoload.php';

// Inclure ton propre autoloader
require_once ROOT . '/Autoloader.php';

// Enregistrer l'autoloader
Autoloader::register();

// Démarrer l'application
$app = new Main;
$app->start();

