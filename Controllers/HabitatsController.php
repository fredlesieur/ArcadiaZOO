<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;

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
        $habitatModel = new HabitatsModel();
        $habitats = $habitatModel->findAll();
        // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Préparer les données envoyées via le formulaire sous forme de tableau  
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'description_courte' => $_POST['description_courte'],
                'image' => $_POST['image'],
                'image2' => $_POST['image2'],
                'image3' => $_POST['image3'],
                'commentaire' => $_POST['commentaire'],
                'user_id' => $_POST['user_id']
            ];
            // Hydratation de l'objet rapport avec les données du formulaire
            $habitatModel->hydrate($data);

            // Mise à jour du rapport dans la base de données
            $habitatModel->create();

            // Redirection vers la liste des habitats après l'ajout
            $_SESSION['success'] = "L'habitat a été créé avec succès.";
            header("Location: /habitats/listHabitats");
            exit();

            //vue du formulaire d'ajout  
        }
        $title = "Créer un habitat";
        $this->render('habitats/add_habitat', compact('title', 'habitats')); 
    }

    public function editHabitat($id)
    {
        $habitatModel = new HabitatsModel();
        $habitat= $habitatModel->find($id);
    
        // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // prépare les données envoyées via le formulaire sous forme de tableau
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'description_courte' => $_POST['description_courte'],
                'image' => $_POST['image'],
                'image2' => $_POST['image2'],
                'image3' => $_POST['image3'],
                'commentaire' => $_POST['commentaire'],
                'user_id' => $_POST['user_id']
            ];
            // Hydratation de l'objet connexion avec les données du formulaire
            $habitatModel->hydrate($data);
    
            // Mettre à jour l'habitat
            $habitatModel->update($id);
    
            // Redirection après modification
            header("Location: /habitats/listHabitats");
            exit;
        }
    
        // Afficher le formulaire de modification
        $title = "Modifier un habitat";
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
