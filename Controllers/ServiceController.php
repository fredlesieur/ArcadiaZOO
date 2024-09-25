<?php

namespace App\Controllers;
use App\Models\ServModel;

class ServiceController extends Controller
{
    public function index()
    {
        $ServModel = new ServModel();
        $criteres = ['categorie' => 'restaurant'];
        $restaurant = $ServModel->findBy($criteres);

        $servModel = new ServModel();
        $critere= ['categorie' => 'train'];
        $train = $ServModel->findBy($critere);

        $servModel = new ServModel();
        $Critere= ['categorie' => 'visite'];
        $visite = $ServModel->findBy($Critere);

        $services = new ServModel();
        $services =$ServModel->findAll();
        $this->render("service/index", compact("restaurant", "services", "train", "visite",));
    }  
}
