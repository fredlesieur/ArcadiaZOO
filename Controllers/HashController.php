<?php

namespace App\Controllers;

class HashController extends Controller
{
    public function index()
    {
     

        // Passer les données organisées à la vue
        $this->render("hash/index");
    }
}