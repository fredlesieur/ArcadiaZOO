<?php

namespace App\Controllers;

use App\Models\VeterinaireModel;
use App\Models\AnimalModel;


class VeterinaireController extends Controller
{
    public function index()
    {
        $title = "Tableau de bord vétérinaire";
        $this->render('veterinaire/index', compact('title'));
    }

    public function ajouterRapport()
    {
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAllOrderedByName(); 

        $veterinaireModel = new VeterinaireModel();
        $veto = $veterinaireModel->findAll();

        $title = "Ajouter un rapport";
        $this->render('veterinaire/ajouterRapport', compact('title', 'animaux'));
    }

    public function saveRapports() 
    {
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAll(); // Récupère tous les animaux pour les afficher dans la liste déroulante

        $veterinaireModel = new VeterinaireModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'],
                'nourriture' => $_POST['nourriture'],
                'grammage' => $_POST['grammage'],
                'date_passage' => $_POST['date_passage'],
                'detail_etat' => $_POST['detail_etat']
            ];

           
            if ($veterinaireModel->ajouterRapport($data)) {
                header("Location: /veterinaire/rapports");
                exit();
            } else {
                echo "Une erreur s'est produite lors de l'ajout du rapport";
            }
        }
    }

    public function rapports()
    {
        $title = "Rapports vétérinaires";

        $veterinaireModel = new VeterinaireModel();
        $rapports = $veterinaireModel->selectRapportsWithAnimals();

        $this->render('veterinaire/rapports', compact('title', 'rapports'));
    }
    public function listeRapports() {
        $veterinaireModel = new VeterinaireModel();
        
        // Récupérer tous les rapports sans filtre
        $rapports = $veterinaireModel->getAllRapports();
    
        // Passer les rapports à la vue
        $this->render('veterinaire/rapports', compact('rapports'));
    }
    
    public function modifierRapport() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Hydrater les données envoyées via le formulaire
            $data = [
                'etat' => $_POST['etat'],
                'nourriture' => $_POST['nourriture'],
                'grammage' => $_POST['grammage'],
                'date_passage' => $_POST['date_passage'],
                'detail_etat' => $_POST['detail_etat']
            ];
    
            // Récupérer l'ID du rapport à modifier
            $rapportId = $_POST['id'];
    
            // Hydrate le modèle et utilise la méthode update
            $VeterinaireModel = new VeterinaireModel();
            $VeterinaireModel->hydrate($data);
            $VeterinaireModel->update($rapportId);
    
            // Redirection après modification
            header('Location: /veterinaire/rapports');
        } else {
            // Si c'est une requête GET, on affiche le formulaire de modification
            $rapportId = $_GET['id'];
            $VeterinaireModel = new VeterinaireModel();
            $rapport = $VeterinaireModel->find($rapportId);
    
            // Afficher le formulaire avec les données du rapport
            $this->render('veterinaire/modifierRapport', compact('rapport'));
        }
    }
    public function supprimerRapport() {
        if (isset($_GET['id'])) {
            $rapportId = $_GET['id'];
    
            // Utiliser la méthode delete de ton modèle pour supprimer
            $VeterinaireModel = new VeterinaireModel();
            $VeterinaireModel->delete($rapportId);
    
            // Redirection après suppression
            header('Location: /veterinaire/rapports');
        }
    }
    
}