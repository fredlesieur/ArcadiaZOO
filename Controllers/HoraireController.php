<?php

namespace App\Controllers;

use App\Models\HoraireModel;

class HoraireController extends Controller
{
    public function index()
    {
        $HoraireModel = new HoraireModel;
        $horaire = $HoraireModel->findAll();
        $this->render("contact/index", compact("horaire"));
    }
}