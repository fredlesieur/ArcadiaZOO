<?php

namespace App\Controllers;

class AnimalController extends Controller
{
    public function index()
    {
        $this->render("animal/index");
    }
}