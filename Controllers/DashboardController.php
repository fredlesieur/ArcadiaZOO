<?php

namespace App\Controllers;

class DashboardController extends Controller
{

    public function index()
    {
        $title = "Tableau de bord";
        $this->render('dashboard/index', compact('title'));
    }
}