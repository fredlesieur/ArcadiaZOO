<?php

namespace App\Controllers;

use App\Models\ConnexionModel;
use App\Models\VeterinaireModel;
class VeterinaireController extends Controller {

    
    private $veterinaireModel;

    public function __construct() {
        $this->veterinaireModel = new VeterinaireModel(); // Instanciation du modèle
    }

    public function saveRapport() {
        // Récupérer les données du formulaire
        $data = [
            'animal_id' => $_POST['animal_id'],
            'etat' => $_POST['etat'],
            'nourriture' => $_POST['nourriture'],
            'grammage' => $_POST['grammage'],
            'date_passage' => $_POST['date_passage'],
            'detail_ett' => $_POST['detail_ett'] ?? null, // facultatif
        ];

        // Appeler la méthode du modèle pour ajouter un rapport
        $this->veterinaireModel->ajouterRapport($data);

        // Redirection après ajout réussi
        header("Location: /veterinaire/rapports");
        exit;
    }
}