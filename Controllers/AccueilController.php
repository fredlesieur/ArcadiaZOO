<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;
use App\Models\AccueilModel;
use App\Models\AvisModel;

class AccueilController extends Controller
{
    public function index()
    {   
       
        $avisModel = new AvisModel();
        $Avis = $avisModel->getAvisValides();

        $AnimalModel = new AnimalModel();
        $animaux = $AnimalModel->findAll();

        $HabitatsModel = new HabitatsModel();
        $habitats = $HabitatsModel->findAll();

        $AccueilModel = new AccueilModel();
        $accueilModel = $AccueilModel->findAll();

        // Affiche la page d'accueil avec les images d'animaux
        $this->render("accueil/index", compact("animaux", "habitats", "accueilModel", "Avis"));
    }
}
