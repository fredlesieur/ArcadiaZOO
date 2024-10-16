<?php

namespace App\Controllers;

class PhpInfoController extends Controller
{
    public function index()
    { 
        // Appelle simplement phpinfo()
        phpinfo();
       
    }
}
