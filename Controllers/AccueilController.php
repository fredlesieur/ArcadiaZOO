<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\HabitatsModel;
use App\Models\AccueilModel;
use App\Models\AvisModel;
use App\Models\CarouselModel;
use Exception;

class AccueilController extends Controller
{
    private $avisModel;
    private $habitatsModel;
    private $accueilModel;
    private $carouselModel;

    public function __construct($avisModel = null, $habitatsModel = null, $accueilModel = null, $carouselModel = null)
    {
        $this->avisModel = $avisModel ?: new AvisModel();
        $this->habitatsModel = $habitatsModel ?: new HabitatsModel();
        $this->accueilModel = $accueilModel ?: new AccueilModel();
        $this->carouselModel = $carouselModel ?: new CarouselModel();
    }

    public function index()
    {
        $Avis = $this->avisModel->getAllValidatedReviews();
        $habitats = $this->habitatsModel->findAll();
        $accueilModel = $this->accueilModel->findAll();
        $carousel = $this->carouselModel->findAllImages();

        $this->render("accueil/index", compact("habitats", "accueilModel", "Avis", "carousel"));
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