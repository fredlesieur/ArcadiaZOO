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
        $image = null; // Initialisation de l'image

        // Vérification et téléchargement de l'image
        if (!empty($_FILES['image']['name'])) {
            $fileUrl = $cloudinaryService->uploadFile($_FILES['image']['tmp_name']);
            if ($fileUrl) {
                $image = $fileUrl;
            } else {
                $error = "Erreur lors de l'upload de l'image.";
            }
        }

        // Insertion dans la base de données
        if ($accueilModel->createAccueil($name, $description, $image)) {
            $_SESSION['success'] = "L'élément a été ajouté avec succès.";
            header("Location: /accueil/listAccueils");
            exit();
        } else {
            $error = "Erreur lors de la création de l'élément.";
        }
    }

    $title = "Ajouter un élément à l'accueil";
    $this->render('accueil/add_accueil', compact('title', 'error'));
}

    
public function editAccueil($id)
{
    $accueilModel = new AccueilModel();
    $accueil = $accueilModel->find($id);
    $cloudinaryService = new CloudinaryService();
    $image = $accueil['image']; // Initialisation de l'image avec celle existante

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];

        // Vérification et téléchargement de l'image
        if (!empty($_FILES['image']['name'])) {
            $fileUrl = $cloudinaryService->uploadFile($_FILES['image']['tmp_name']);
            if ($fileUrl) {
                $image = $fileUrl;
            } else {
                $error = "Erreur lors de l'upload de l'image.";
            }
        }

        // Mise à jour dans la base de données
        if ($accueilModel->updateAccueil($id, $name, $description, $image)) {
            $_SESSION['success'] = "L'élément de l'accueil a été modifié avec succès.";
            header("Location: /accueil/listAccueils");
            exit();
        } else {
            $error = "Erreur lors de la modification de l'accueil.";
        }
    }

    $title = "Modifier un élément de l'accueil";
    $this->render('accueil/edit_accueil', compact('accueil', 'title', 'error'));
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