<?php

namespace App\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        $this->render("Service/index");
    }
}