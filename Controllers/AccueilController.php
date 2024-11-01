<?php

namespace App\Controllers;
use App\Config\CloudinaryService;
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
    $cloudinaryService = new CloudinaryService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $description = $_POST['description'];
    
            // Vérification et téléchargement de l'image
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];
                $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                if ($fileUrl) {
                    $image = $fileUrl;
                    if ($accueilModel->createAccueil($name, $description, $image)) {
                        $_SESSION['success'] = "L'animal a été modifié avec succès.";
                        header("Location: /accueil/listAccueils");
                        exit();
                    } else {
                        $error = "Erreur lors de la modification de l'animal.";
                    }
                } else {
                    $error = "Erreur lors de l'upload de l'image.";
                } 
            }

        }
    
        $title = "Ajouter un élément à l'accueil";
        $this->render('accueil/add_accueil', compact('title'));
    }
    
    public function editAccueil($id)
    {
        $accueilModel = new AccueilModel();
        $accueil = $accueilModel->find($id);
        $cloudinaryService = new CloudinaryService();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];

    
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $image = $_FILES['image'];
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        $image = $fileUrl;
                        if ($accueilModel->updateAccueil($id, $name, $description, $image)) {
                            $_SESSION['success'] = "L'accueil a été modifié avec succès.";
                            header("Location: /accueil/listAccueils");
                            exit();
                        } else {
                            $error = "Erreur lors de la modification de l'accueil.";
                        }
                    } else {
                        $error = "Erreur lors de l'upload de l'image.";
                    } 
                }
    
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