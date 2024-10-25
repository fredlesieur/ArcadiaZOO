<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;

class AnimalController extends Controller {

    public function viewAnimal($id)
    {
        $animalModel = new AnimalModel();
    
        // Incrémente le compteur de vues
        // $animalModel->incrementViews($id);
    
        // Récupère les informations de l'animal après l'incrémentation
        $animal = $animalModel->find($id);
    
        // Vérification : Si l'animal est trouvé, on l'affiche, sinon message d'erreur
        if (is_array($animal)) {
            // Ajout temporaire pour tester les données récupérées
            var_dump($animal); // Tu peux retirer cette ligne après le test
            $this->render('animaux/index', compact('animal'));
        } else {
            echo "Animal non trouvé.";
        }
    }

    // AnimalController.php

    public function incrementViews()
    {
        // Récupérer l'ID depuis le corps de la requête JSON
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if ($id) {
            $animalModel = new AnimalModel();
            $animalModel->incrementViews($id);

            // Répond avec un message de succès en JSON
            echo json_encode(['success' => true]);
        } else {
            // Renvoyer une réponse JSON en cas d'erreur
            echo json_encode(['success' => false, 'message' => 'ID invalide ou non fourni']);
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
    
    
}