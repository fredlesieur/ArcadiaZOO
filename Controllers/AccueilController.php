<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;
use App\Models\AccueilModel;
use App\Models\AvisModel;
use Exception;

class AccueilController extends Controller
{
    public function index()
    {   
       
        $avisModel = new AvisModel();
        $Avis = $avisModel->getAllValidatedReviews();

        $AnimalModel = new AnimalModel();
        $animaux = $AnimalModel->findAll();

        $HabitatsModel = new HabitatsModel();
        $habitats = $HabitatsModel->findAll();

        $AccueilModel = new AccueilModel();
        $accueilModel = $AccueilModel->findAll();

        // Affiche la page d'accueil avec les images d'animaux
        $this->render("accueil/index", compact("animaux", "habitats", "accueilModel", "Avis"));
    }

    public function listAccueils()
    {
        $accueilModel = new AccueilModel();
        $accueils = $accueilModel->findAll();

        $title = "Liste des éléments de l'accueil";
        $this->render('accueil/liste_accueils', compact('accueils', 'title'));
    }

    public function addAccueil()
    {
        $accueilModel = new AccueilModel();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];
    
            // Vérification et téléchargement de l'image
            if (!empty($_FILES['image']['name'])) {
                try {
                    $data['image'] = $accueilModel->uploadImage($_FILES['image'], 'assets/images/');
                } catch (Exception $e) {
                    $_SESSION['error'] = "Erreur lors du téléchargement de l'image : " . $e->getMessage();
                }
            }
    
            $accueilModel->hydrate($data);
            $accueilModel->create();
    
            $_SESSION['success'] = "Élément ajouté avec succès à l'accueil.";
            header("Location: /accueil/listAccueils");
            exit();
        }
    
        $title = "Ajouter un élément à l'accueil";
        $this->render('accueil/add_accueil', compact('title'));
    }
    
    public function editAccueil($id)
    {
        $accueilModel = new AccueilModel();
        $accueil = $accueilModel->find($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];
    
            // Vérification et téléchargement de l'image
            if (!empty($_FILES['image']['name'])) {
                try {
                    $data['image'] = $accueilModel->uploadImage($_FILES['image'], 'assets/images/');
                } catch (Exception $e) {
                    $_SESSION['error'] = "Erreur lors du téléchargement de l'image : " . $e->getMessage();
                }
            }
    
            $accueilModel->hydrate($data);
            $accueilModel->update($id);
    
            $_SESSION['success'] = "Élément modifié avec succès.";
            header("Location: /accueil/listAccueils");
            exit();
        }
    
        $title = "Modifier un élément de l'accueil";
        $this->render('accueil/edit_accueil', compact('accueil', 'title'));
    }
    

    public function deleteAccueil($id)
    {
        $accueilModel = new AccueilModel();
        $accueilModel->delete($id);

        $_SESSION['success'] = "Élément supprimé avec succès.";
        header("Location: /accueil/listAccueils");
        exit();
    }

    
}