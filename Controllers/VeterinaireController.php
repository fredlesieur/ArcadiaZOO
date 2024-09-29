<?php

namespace App\Controllers;

use App\Models\VeterinaireModel;

class VeterinaireController extends Controller {

    private $veterinaireModel;

    public function __construct() {
        // Instanciation du modèle vétérinaire (qui contient la logique de connexion à la base de données)
        $this->veterinaireModel = new VeterinaireModel();
    }

    // Affiche le tableau de bord vétérinaire
    public function index() {
        // Définir le titre de la page
        $title = "Tableau de bord vétérinaire";
    
        // Passer la variable à la vue
        $this->render('/veterinaire/index', compact('title'));
    }
    
    public function saveRapport() {
        // Vérifie si le formulaire a été soumis
        if ($_POST) {
            $data = [
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'],
                'nourriture' => $_POST['nourriture'],
                'grammage' => $_POST['grammage'],
                'date_passage' => $_POST['date_passage'],
                'detail_etat' => $_POST['detail_etat'],
                'user_id' => $_SESSION['user_id'] // Assuré par la session
            ];
    
            // Appelle la méthode du modèle pour ajouter le rapport
            $this->veterinaireModel->ajouterRapport($data);
    
            // Redirection vers la page des rapports
            header('Location: /veterinaire/rapports');
            exit; // Important d'arrêter l'exécution après la redirection
        }
    }
    
    public function rapports() {
        // Récupérer tous les rapports via le modèle
        $rapports = $this->veterinaireModel->getAllRapports();
    
        // Définir le titre de la page
        $title = "Rapports vétérinaires";
    
        // Passer la variable à la vue
        $this->render('/veterinaire/rapports', compact('rapports', 'title'));
    }
    
}
