<?php

use App\Autoloader;
use App\Config\Main;

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

// Définir la constante ROOT pour la racine du projet
define('ROOT', dirname(__DIR__));

// Inclure l'autoloader de Composer
require_once ROOT . '/vendor/autoload.php';  // L'ajout essentiel pour PHPMailer

// Inclure ton propre autoloader
require_once ROOT . '/Autoloader.php';

// Enregistrer l'autoloader
Autoloader::register();

// Démarrer l'application
$app = new Main;
$app->start();

