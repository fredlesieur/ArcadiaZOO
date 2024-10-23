<?php

namespace App\Controllers;

use App\Models\CarouselModel;

class CarouselController extends Controller
{
    public function index()
    {   
        // Instancie le modèle du carrousel
        $CarouselModel = new CarouselModel();
        
        // Récupère toutes les images du carrousel
        $carousel = $CarouselModel->findAllImages();
        // Si aucun résultat n'est trouvé, initialise un tableau vide
        if (!$carousel) {
            $carousel = [];
        }

        // Affiche la page d'accueil avec les images d'animaux
        $this->render("carousel/index", compact("carousel"));
    }
}
