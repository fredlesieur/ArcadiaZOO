<?php

namespace App\Controllers;

use App\Models\AnimalModel;

class AccueilController extends Controller
{
    public function index()
    {   
        $AnimalModel = new AnimalModel();
        $animaux = $AnimalModel->findAll();

        // Affiche la page d'accueil avec les images d'animaux
        $this->render("accueil/index", compact("animaux"));
    }
}
