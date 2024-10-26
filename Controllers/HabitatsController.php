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
    $habitats = $habitatModel->findAll(); // Récupère tous les habitats

    // Initialisation de la variable $habitat (pour éviter les erreurs dans la vue)
    $habitat = null;

    // Si c'est un vétérinaire, on vérifie si un habitat est sélectionné et on récupère ses données
    if ($_SESSION['role'] === 'veterinaire' && !empty($_POST['id_habitat'])) {
        $id_habitat = $_POST['id_habitat'];
        $habitat = $habitatModel->find($id_habitat); // Récupère l'habitat sélectionné
    }

    // Traitement des requêtes POST pour l'ajout d'habitat ou de commentaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Si c'est un vétérinaire qui soumet le formulaire
        if ($_SESSION['role'] === 'veterinaire') {
            // On vérifie à nouveau si un habitat est sélectionné et récupéré
            if (!empty($habitat) && !empty($habitat['commentaire'])) {
                $_SESSION['error'] = "Un commentaire existe déjà pour cet habitat. Utilisez la modification.";
                header("Location: /habitats/addHabitat");
                exit();
            }

            // Ajouter le commentaire si aucun n'existe
            $commentaire = $_POST['commentaire'];
            $habitatModel->hydrate(['commentaire' => $commentaire]);
            $habitatModel->update($id_habitat);

            $_SESSION['success'] = "Commentaire ajouté avec succès.";
            header("Location: /habitats/listHabitats");
            exit();
        }

        // Si c'est un administrateur qui soumet le formulaire
        if ($_SESSION['role'] === 'administrateur') {
            $name = $_POST['name'];
            $existingHabitat = $habitatModel->findBy(['name' => $name]);

            // Si un habitat avec ce nom existe déjà, empêcher la création
            if (!empty($existingHabitat)) {
                $_SESSION['error'] = "Cet habitat existe déjà.";
                header("Location: /habitats/addHabitat");
                exit();
            }

            // Ajouter un nouvel habitat
            $data = [
                'name' => $name,
                'description' => $_POST['description'],
                'description_courte' => $_POST['description_courte'],
                'user_id' => $_SESSION['user_id']
            ];

            // Gestion des images
            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $habitatModel->uploadImage($_FILES['image']);
            }
            if (!empty($_FILES['image2']['name'])) {
                $data['image2'] = $habitatModel->uploadImage($_FILES['image2']);
            }
            if (!empty($_FILES['image3']['name'])) {
                $data['image3'] = $habitatModel->uploadImage($_FILES['image3']);
            }

            // Hydrater et créer l'habitat
            $habitatModel->hydrate($data);
            $habitatModel->create();

            $_SESSION['success'] = "Habitat ajouté avec succès.";
            header("Location: /habitats/listHabitats");
            exit();
        }
    }

    // Rendre la vue avec les habitats et l'habitat sélectionné (si applicable)
    $this->render('habitats/add_habitat', compact('habitats', 'habitat'));
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
                'commentaire' => $_POST['commentaire'],
                'user_id' => $_POST['user_id']
            ];

            // Utilisation de la fonction d'upload pour chaque image pour les mettre à jour
        if (!empty($_FILES['image']['name'])) {
            $data['image'] = $habitatModel->uploadImage($_FILES['image'], 'assets/images/');
        }
        if (!empty($_FILES['image2']['name'])) {
            $data['image2'] = $habitatModel->uploadImage($_FILES['image2'], 'assets/images/');
        }
        if (!empty($_FILES['image3']['name'])) {
            $data['image3'] = $habitatModel->uploadImage($_FILES['image3'], 'assets/images/');
        }

            // Hydratation de l'objet connexion avec les données du formulaire
            $habitatModel->hydrate($data);
    
            // Mettre à jour l'habitat
            $habitatModel->update($id);
    
            // Redirection après modification
            $_SESSION['success'] = "habitat modifié avec succès.";
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
