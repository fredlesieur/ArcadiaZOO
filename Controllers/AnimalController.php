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

    public function addAnimal()
{
    $animalModel = new AnimalModel();
    $animaux = $animalModel->findAll();
    $habitatModel = new HabitatsModel();
    $habitats = $habitatModel->findAll();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $data = [
            'nom' => $_POST['nom'],
            'age' => $_POST['age'],
            'race' => $_POST['race'],
            'id_habitats' => $_POST['id_habitat']
        ];

        if (!empty($_FILES['image']['name'])) {
    
            $uploadedImage = $animalModel->uploadImage($_FILES['image']);
            if ($uploadedImage) {
                echo "Téléchargement réussi !<br>";
                $data['image'] = $uploadedImage;
            } else {
                echo "Erreur lors du téléchargement de l'image.<br>";
            }
        }

        $animalModel->hydrate($data);
        $animalModel->create();

        $_SESSION['success'] = "L'animal a été créé avec succès.";
        header("Location: /animal/listAnimals");
        exit();
    }

    $title = "Créer un animal";
    $this->render('animaux/add_animal', compact('title', 'habitats', 'animaux'));
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
                'id_habitats' => $_POST['id_habitats']
            ];
             // Utilisation de la fonction d'upload pour mettre à jour l'image
            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $animalModel->uploadImage($_FILES['image'], 'assets/images/');
            }
    
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
    public function incrementViews($id)
{
    header('Content-Type: application/json');

    // Valider l'ID
    if (!is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'ID invalide']);
        exit;
    }

    $animalModel = new AnimalModel();

    // Appele la méthode incrementViews de mon model pour mettre à jour le compteur de vues
    $result = $animalModel->incrementViews((int)$id);

    // Vérifie la requête qui a été exécutée
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Compteur de vues mis à jour']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Échec de la mise à jour du compteur de vues']);
    }

    exit;
}


}
