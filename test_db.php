<?php
use App\Config\Db;

require_once '../Config/Db.php';

try {
    $db = Db::getInstance();
    echo "Connexion réussie à la base de données.";
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
