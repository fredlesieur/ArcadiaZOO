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
        $accueils = $this->accueilModel->findAll();
        $title = "Liste des éléments de l'accueil";
        $this->render('accueil/liste_accueils', compact('accueils', 'title'));
    }

    public function addAccueil()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? null;
                $description = $_POST['description'] ?? null;

                if (empty($name) || empty($description)) {
                    throw new Exception("Tous les champs sont obligatoires.");
                }

                $image = null;
                if (!empty($_FILES['image']['name'])) {
                    $cloudinaryService = new CloudinaryService();
                    $image = $cloudinaryService->uploadFile($_FILES['image']['tmp_name']);
                }

                if ($this->accueilModel->createAccueil($name, $description, $image)) {
                    $_SESSION['success'] = "L'élément a été ajouté avec succès.";
                    header("Location: /accueil/listAccueils");
                    exit();
                } else {
                    throw new Exception("Erreur lors de la création de l'élément.");
                }
            }

            $title = "Ajouter un élément à l'accueil";
            $this->render('accueil/add_accueil', compact('title'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Ajouter un élément à l'accueil";
            $this->render('accueil/add_accueil', compact('title', 'error'));
        }
    }

    public function editAccueil($id)
    {
        try {
            $accueil = $this->accueilModel->find($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'] ?? null;
                $description = $_POST['description'] ?? null;

                if (empty($name) || empty($description)) {
                    throw new Exception("Tous les champs sont obligatoires.");
                }

                $image = $accueil['image'];
                if (!empty($_FILES['image']['name'])) {
                    $cloudinaryService = new CloudinaryService();
                    $image = $cloudinaryService->uploadFile($_FILES['image']['tmp_name']);
                }

                if ($this->accueilModel->updateAccueil($id, $name, $description, $image)) {
                    $_SESSION['success'] = "L'élément de l'accueil a été modifié avec succès.";
                    header("Location: /accueil/listAccueils");
                    exit();
                } else {
                    throw new Exception("Erreur lors de la modification de l'accueil.");
                }
            }

            $title = "Modifier un élément de l'accueil";
            $this->render('accueil/edit_accueil', compact('accueil', 'title'));
        } catch (Exception $e) {
            $error = $e->getMessage();
            $title = "Modifier un élément de l'accueil";
            $accueil = $this->accueilModel->find($id);
            $this->render('accueil/edit_accueil', compact('accueil', 'title', 'error'));
        }
    }

    public function deleteAccueil($id)
    {
        if ($this->accueilModel->delete($id)) {
            $_SESSION['success'] = "Élément supprimé avec succès.";
        } else {
            $_SESSION['error'] = "Erreur lors de la suppression de l'élément.";
        }
        header("Location: /accueil/listAccueils");
        exit();
    }
}
