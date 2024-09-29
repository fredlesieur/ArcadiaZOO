<?php

namespace App\Controllers;

use App\Models\ConnexionModel;
use App\Models\VeterinaireModel;
class VeterinaireController extends Controller {

    
    // Affiche le tableau de bord vétérinaire
    public function index() {
        // Définir le titre de la page
        $title = "Tableau de bord vétérinaire";
    
        // Passer la variable à la vue
        $this->render('/veterinaire/index', compact('title'));
    }

    public function ajouterRapport()
{
    // Logique pour gérer la nourriture des animaux
    $title = "Ajouter un rapport";
    $this->render('/veterinaire/ajouterRapport', compact('title'));
}
}