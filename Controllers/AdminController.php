<?php

namespace App\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Afficher le tableau de bord de l'admin
        $title = "Tableau de bord administrateur";
        $this->render('admin/index', compact('title'));
    }
}
