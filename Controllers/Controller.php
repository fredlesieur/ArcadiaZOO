<?php

namespace App\Controllers;

abstract class Controller
{
    public function render(string $file, array $donnees = [])
    {
        
        // On extrait les données pour les rendre disponibles dans la vue
        extract($donnees);

        // Démarre la capture de sortie
        ob_start();

        // Chemin vers le fichier de vue
        require_once ROOT . '/Views/' . $file . '.php';

        // On récupère le contenu de la vue
        $contenu = ob_get_clean();

        // Inclure le fichier default.php pour le template global
       require_once ROOT . '/Views/default.php';
    }
}
