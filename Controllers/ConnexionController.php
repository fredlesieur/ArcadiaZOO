<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class ConnexionController extends Controller
{
    public function index()
    {
        $ConnexionModel = new ConnexionModel;
        $connexions = $ConnexionModel->findAll();
        $this->render("contact/index", compact("horaire"));
    }
}