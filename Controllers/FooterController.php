<?php

namespace App\Controllers;


class FooterController extends Controller
{
    public function cgu()
    {
     

        $this->render("footer/cgu");
    }  

    public function mentionsLegales()
    {
     

        $this->render("footer/mentionsLegale");
    }

    public function rgpd()
    {
     

        $this->render("footer/rgpd");
    }
}
