<?php

namespace App\Controllers;
use App\Models\AnimalModel;
class GalerieController extends Controller
{
public function index()
{
    $AnimalModel = new AnimalModel;
    $animaux = $AnimalModel->findAll();

  
    $this->render("accueil/index", compact("animaux"));
}

}