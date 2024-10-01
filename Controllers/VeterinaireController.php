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

    public function rapports()
    {
        $title = "Rapports vétérinaires";
        $veterinaireModel = new VeterinaireModel();
        $rapports = $veterinaireModel->findAll();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user_id = $_SESSION['user_id'];
            $animal_id = $_POST['animal_id'];
            $etat = $_POST['etat'];
            $nourriture = $_POST['nourriture'];
            $grammage = $_POST['grammage'];
            $date_passage = $_POST['date_passage'];
            $detail_etat = $_POST['detail_etat'];

            if ($veterinaireModel->ajouterRapport($user_id, $animal_id, $etat, $nourriture, $grammage, $date_passage, $detail_etat)) {
                header("Location: /veterinaire");
                exit();
            } else {
            echo "Une erreur s'est produite";
            }
        }

        $this->render('veterinaire/rapports/index', compact('title', 'rapports'));
    }
}