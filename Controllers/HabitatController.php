<?php

namespace App\Controllers;
use App\Models\HabitatsModel;
class HabitatController extends AccueilController
{
    public function index()
    {
        $HabitatsModel = new HabitatsModel();
        $Habitats = $HabitatsModel->findAll();

        $HabitatsModel = new HabitatsModel();
        $habitat = $HabitatsModel->findAll();

        $HabitatsModel = new HabitatsModel();
        $habitation = $HabitatsModel->findAll();



        $this->render("habitats/index", compact("Habitats", "habitat", "habitation"));
    }
}