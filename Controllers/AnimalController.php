<?php

namespace App\Controllers;
use App\Models\AnimalModel;

class AnimalController extends Controller
{
    public function index()
    {   
        $AnimalModel = new AnimalModel();
        $animals = $AnimalModel->findAll();
        $this->render("Animal/index", compact('animals'));

    }
}