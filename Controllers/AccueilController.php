<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;
use App\Models\AccueilModel;
use App\Models\AvisModel;

class AccueilController extends Controller
{
    public function index()
    {   
       
        $avisModel = new AvisModel();
        $Avis = $avisModel->getAvisValides();

        $AnimalModel = new AnimalModel();
        $animaux = $AnimalModel->findAll();

        $HabitatsModel = new HabitatsModel();
        $habitats = $HabitatsModel->findAll();

        $AccueilModel = new AccueilModel();
        $accueilModel = $AccueilModel->findAll();

        // Affiche la page d'accueil avec les images d'animaux
        $this->render("accueil/index", compact("animaux", "habitats", "accueilModel", "Avis"));
    }

    public function addaccueil()
    {
        $accueilModel = new accueilModel();

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
            $accueilModel->hydrate($data);

            // Mise à jour du rapport dans la base de données
            $accueilModel->create();

            // Redirection vers la liste des accueils après l'ajout
            $_SESSION['success'] = "L'animal a été créé avec succès.";
            header("Location: /accueils/listaccueils");
            exit();

            //vue du formulaire d'ajout
            $title = "Créer un accueil";
            $this->render('accueils/add_accueil', compact('title'));
        }
    }

    public function editaccueil($id)
    {
        $accueilModel = new accueilsModel();
        $accueils= $accueilModel->find($id);
    
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
            $accueilModel->hydrate($data);
    
            // Mettre à jour l'accueil
            $accueilModel->update($id);
    
            // Redirection après modification
            header("Location: /accueils/listaccueils");
            exit;
        }
    
        // Afficher le formulaire de modification
        $title = "Modifier un accueil";
        $this->render('accueils/edit_accueil', compact('accueils', 'title'));
    }

    public function listaccueils()
{
    // Utilisation du modèle pour récupérer tous les accueils
    $accueilModel = new accueilsModel();
    $animaux = $accueilModel->findAll(); // Récupérer tous les accueils

    $title = "Liste des accueils";
    // Passer les utilisateurs à la vue
    $this->render('accueils/liste_accueils', compact('animaux', 'title'));
}

public function deleteaccueil($id)
    {
        $accueilModel = new accueilsModel();
        $accueilModel->delete($id);

        // Redirection après suppression
        $_SESSION['success'] = "Utilisateur supprimé avec succès.";
        header("Location: /accueils/listaccueils");
        exit;
    }
}
