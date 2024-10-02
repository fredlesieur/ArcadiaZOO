<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\VeterinaireModel;
use App\Controllers\VeterinaireController;

class AnimalController extends Controller {

    // Méthode pour afficher la fiche d'un animal dans `index.php`
    public function fiche($id) {
        $AnimalModel = new AnimalModel();
        $animal = $AnimalModel->getRapportByAnimalId($id);

        // Si l'animal est trouvé, on l'affiche dans la vue `index.php`
        if ($animal) {
            $this->render('animaux/index', [
                'animal' => $animal
            ]);
        } else {
            echo "Animal non trouvé.";
        }
    }
}

