<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;

class AnimalController extends Controller {

    public function viewAnimal($id) {
        $animalModel = new AnimalModel();
        $animal = $animalModel->getRapportByAnimalId($id);

        if ($animal) {
            $this->render('animaux/index', compact('animal'));
        } else {
            echo "Animal non trouvé.";
        }
    }

    public function addAnimal() {
        $animalModel = new AnimalModel();
        $habitatModel = new HabitatsModel();
        $habitats = $habitatModel->findAll(); // Récupérer tous les habitats pour la liste déroulante

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'age' => $_POST['age'],
                'race' => $_POST['race'],
                'image' => $_POST['image'],
                'id_habitats' => $_POST['id_habitats']
            ];
            $animalModel->hydrate($data);
            $animalModel->create();

            $_SESSION['success'] = "L'animal a été créé avec succès.";
            header("Location: /animal/listAnimals");
            exit();
        }

        $title = "Créer un animal";
        $this->render('animaux/add_animal', compact('title', 'habitats'));
    }

    public function editAnimal($id) {
        $animalModel = new AnimalModel();
        $habitatModel = new HabitatsModel();
        $animaux = $animalModel->find($id);
        $habitats = $habitatModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'age' => $_POST['age'],
                'race' => $_POST['race'],
                'image' => $_POST['image'],
                'id_habitats' => $_POST['id_habitats']
            ];
            $animalModel->hydrate($data);
            $animalModel->update($id);

            header("Location: /animal/listAnimals");
            exit;
        }

        $title = "Modifier un animal";
        $this->render('animaux/edit_animal', compact('animaux', 'habitats', 'title'));
    }

    public function listAnimals() {
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAllWithHabitats(); // Récupérer tous les animaux avec leurs habitats

        $title = "Liste des animaux";
        $this->render('animaux/liste_animals', compact('animaux', 'title'));
    }

    public function deleteAnimal($id) {
        $animalModel = new AnimalModel();
        $animal = $animalModel->find($id);
        if ($animal) {
            $animalModel->delete($id);
            $_SESSION['success'] = "L'animal a été supprimé avec succès.";
        } else {
            $_SESSION['error'] = "L'animal que vous essayez de supprimer n'existe pas.";
        }
        header("Location: /animal/listAnimals");
        exit;
    }
}
