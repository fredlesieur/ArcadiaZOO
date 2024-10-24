<?php

// Définir la constante ROOT pour la racine du projet
define('ROOT', dirname(__DIR__));

// Charger l'autoloader de Composer
require_once ROOT . '/vendor/autoload.php';

// Charger ton propre autoloader
require_once ROOT . '/Autoloader.php';
\App\Autoloader::register();
