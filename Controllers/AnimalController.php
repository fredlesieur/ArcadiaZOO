<?php

namespace App\Controllers;
use App\Models\AnimalModel;

class AnimalController extends Controller
{
    public function index()
    {
        $this->render("animaux/index");
    }
}