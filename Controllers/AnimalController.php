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
    public function incrementViews($animalId)
    {
        // Log du token CSRF reçu
        error_log('Token CSRF reçu : ' . $_POST['csrf_token']);
    
        // Vérification du token CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            error_log('Erreur CSRF : token invalide ou manquant');
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Invalid CSRF token.']);
            return;
        }
    
        // Logique d'incrémentation du compteur de vues
        // ...
    }
    
}