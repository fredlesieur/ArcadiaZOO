<?php

namespace App\Controllers;

class HabitatController extends Controller
{
    public function index()
    {
        $this->render("habitat/index");
    }
}