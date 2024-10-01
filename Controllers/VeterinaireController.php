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
        $animaux = $animalModel->findAll(); 

        $title = "Ajouter un rapport";
        $this->render('veterinaire/ajouterRapport', compact('title', 'animaux'));
    }

    public function saveRapport()
    {
        $data = [
            'animal_id' => $_POST['animal_id'],
            'etat' => $_POST['etat'],
            'nourriture' => $_POST['nourriture'],
            'grammage' => $_POST['grammage'],
            'date_passage' => $_POST['date_passage'],
            'detail_etat' => $_POST['detail_etat'] ?? null,
            'user_id' => $_SESSION['user_id'],
        ];

        $veterinaireModel = new VeterinaireModel();

        if ($veterinaireModel->ajouterRapport($data)) {
            header("Location: /veterinaire/rapports");
            exit;
        } else {
            echo "Une erreur s'est produite lors de l'ajout du rapport.";
        }
    }

    public function rapports()
    {
        $title = "Rapports vétérinaires";
        $veterinaireModel = new VeterinaireModel();
        $rapports = $veterinaireModel->findAll();

        $this->render('veterinaire/rapports', compact('title', 'rapports'));
    }
}
