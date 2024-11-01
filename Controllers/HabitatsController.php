<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;
use App\Config\CloudinaryService;

class HabitatsController extends Controller
{
    public function index()
    {
        // Récupère tous les habitats
        $habitatsModel = new HabitatsModel();
        $habitats = $habitatsModel->findAll();

        // Utilise la vue 'habitats/index' pour afficher la liste des habitats
        $this->render("habitats/index", compact("habitats"));
    }

    public function showHabitat($id) {
        // Récupérer l'habitat spécifique
        $habitatsModel = new HabitatsModel();
        $habitat = $habitatsModel->find($id); // Utiliser la variable '$habitat'
    
        // Récupérer les animaux liés à cet habitat
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findBy(['id_habitats' => $id]);
    
        // Si l'habitat existe, on passe les données à la vue
        if ($habitat) {
            $this->render('habitats/show_habitat', compact('habitat', 'animaux'));
        } else {
            echo "Habitat non trouvé.";
        }
    }
    

    public function addHabitat()
    {
        $habitatsModel = new HabitatsModel();
        $habitats = $habitatsModel->findAll(); // Récupère tous les habitats pour le menu déroulant
        $cloudinaryService = new CloudinaryService();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_SESSION['role'] === 'veterinaire') {
                $id_habitat = $_POST['id_habitat'];
                $commentaire = $_POST['commentaire'];
                $habitatsModel->updateCommentaire($id_habitat, $commentaire);
                $_SESSION['success'] = "Commentaire ajouté avec succès.";
                header("Location: /habitats/listHabitats");
                exit();
            }
    
            if ($_SESSION['role'] === 'administrateur') {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $description_courte = $_POST['description_courte'];
                $user_id = $_SESSION['user_id'];
    
                $image = !empty($_FILES['image']['name']) ? $cloudinaryService->uploadFile($_FILES['image']['tmp_name']) : null;
                $image2 = !empty($_FILES['image2']['name']) ? $cloudinaryService->uploadFile($_FILES['image2']['tmp_name']) : null;
                $image3 = !empty($_FILES['image3']['name']) ? $cloudinaryService->uploadFile($_FILES['image3']['tmp_name']) : null;
    
                $habitatsModel->createHabitat($name, $description, $description_courte, '', $user_id, $image, $image2, $image3);
                $_SESSION['success'] = "L'habitat a été ajouté avec succès.";
                header("Location: /habitats/listHabitats");
                exit();
            }
        }
    
        $title = "Ajouter un habitat";
        $this->render('habitats/add_habitat', compact('title', 'habitats'));
    }
    
    public function editHabitat($id)
    {
        $habitatModel = new HabitatsModel();
        $habitat = $habitatModel->find($id);
        $cloudinaryService = new CloudinaryService();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = $_POST['name'];
            $commentaire = $_POST['commentaire'];
            $user_id = $_SESSION['user_id'];
    
            // Si l'utilisateur est administrateur, récupérer également les descriptions
            if ($_SESSION['role'] === 'administrateur') {
                $description = $_POST['description'];
                $description_courte = $_POST['description_courte'];
            } else {
                // Si l'utilisateur est vétérinaire, garder les descriptions actuelles
                $description = $habitat['description'];
                $description_courte = $habitat['description_courte'];
            }
    
            // Gestion de l'upload des images
            $image = $habitat['image'];
            $image2 = $habitat['image2'];
            $image3 = $habitat['image3'];
    
            if (!empty($_FILES['image']['name'])) {
                $fileUrl = $cloudinaryService->uploadFile($_FILES['image']['tmp_name']);
                if ($fileUrl) {
                    $image = $fileUrl;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
    
            if (!empty($_FILES['image2']['name'])) {
                $fileUrl = $cloudinaryService->uploadFile($_FILES['image2']['tmp_name']);
                if ($fileUrl) {
                    $image2 = $fileUrl;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
    
            if (!empty($_FILES['image3']['name'])) {
                $fileUrl = $cloudinaryService->uploadFile($_FILES['image3']['tmp_name']);
                if ($fileUrl) {
                    $image3 = $fileUrl;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
    
            // Mettre à jour l'habitat dans la base de données
            if ($habitatModel->updateHabitat($id, $name, $description, $description_courte, $commentaire, $user_id, $image, $image2, $image3)) {
                $_SESSION['success'] = "L'habitat a été modifié avec succès.";
                header("Location: /habitats/listHabitats");
                exit();
            } else {
                $_SESSION['error'] = "Erreur lors de la modification de l'habitat.";
            }
        }
    
        // Afficher le formulaire de modification
        $title = "Modifier l'habitat";
        $this->render('habitats/edit_habitat', compact('habitat', 'title'));
    }
    
    
    public function listHabitats()
{
    // Utilisation du modèle pour récupérer tous les habitats
    $habitatModel = new HabitatsModel();
    $habitats = $habitatModel->findAll(); // Récupérer tous les habitats

    $title = "Liste des habitats";
    // Passer les utilisateurs à la vue
    $this->render('habitats/liste_habitats', compact('habitats', 'title'));
}

public function deleteHabitat($id)
    {
        $habitatModel = new HabitatsModel();
        $habitatModel->delete($id);

        // Redirection après suppression
        $_SESSION['success'] = "Utilisateur supprimé avec succès.";
        header("Location: /habitats/listHabitats");
        exit;
    }
}
