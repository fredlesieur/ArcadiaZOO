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
}