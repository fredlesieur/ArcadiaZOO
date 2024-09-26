<?php
namespace App\Controllers;

use App\Models\HabitatsModel;
use App\Models\AnimalModel;

class HabitatController extends Controller {

    public function decouvrir($id) {
        // Récupérer l'habitat spécifique
        $habitatsModel = new HabitatsModel();
        $habitat = $habitatsModel->find($id);

        // Récupérer les animaux liés à cet habitat
        $AnimalModel = new AnimalModel();
        $animaux = $AnimalModel->findBy(['id_habitats' => $id]);

        // Si l'habitat existe, on passe les données à la vue
        if ($habitat) {
            $this->render('habitat/index', compact('habitat', 'animaux'));
        } else {
            echo "Habitat non trouvé.";
        }
    }
}


