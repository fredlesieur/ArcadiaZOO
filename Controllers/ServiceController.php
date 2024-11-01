<?php

namespace App\Controllers;
use App\Models\ServiceModel;
use App\Config\CloudinaryService;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceModel = new ServiceModel();
        $services = $serviceModel->findAll();
        // Récupère tous les services et les classe par catégorie
        $servicesByCategory = [];

        // Organise les services par catégorie
        foreach ($services as $service) {
            $category = $service['categorie'];
            $servicesByCategory[$category][] = $service;
        }

        // Passer les données organisées à la vue
        $this->render("service/index", compact("servicesByCategory", "services"));
    }

    public function addServ()
{
    $serviceModel = new ServiceModel();
    $cloudinaryService = new CloudinaryService();
    $categories = $serviceModel->getUniqueCategories();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie la catégorie sélectionnée ou nouvelle
        $categorie = !empty($_POST['categorie']) && $_POST['categorie'] !== 'autre'
            ? $_POST['categorie']
            : (!empty($_POST['new-category']) ? $_POST['new-category'] : null);

        if (!$categorie) {
            $_SESSION['error'] = "Vous devez sélectionner une catégorie ou en créer une nouvelle.";
            header("Location: /service/addServ");
            exit();
        }

        // Préparation des données à insérer
        $name = $_POST['name'];
        $description = $_POST['description'];
        $duree = $_POST['duree'];
        $tarifs = $_POST['tarifs'];
        $horaires = $_POST['horaires'];

        // Gestion de l'upload des images via Cloudinary
        $image = null;
        $image2 = null;

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

        // Insertion dans la base de données
        if ($serviceModel->createService($name, $description, $categorie, $duree, $tarifs, $horaires, $image, $image2)) {
            $_SESSION['success'] = "Service ajouté avec succès.";
            header("Location: /service/listservices");
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de l'ajout du service.";
        }
    }

    $title = "Ajouter un service";
    $this->render('service/add_serv', compact('title', 'categories'));
}

    
public function editServ($id)
{
    $serviceModel = new ServiceModel();
    $service = $serviceModel->find($id);
    $allCategories = $serviceModel->getAllCategories();
    $cloudinaryService = new CloudinaryService();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie la catégorie sélectionnée ou nouvelle
        $categorie = !empty($_POST['new-category']) ? $_POST['new-category'] : $_POST['categorie'];

        if (empty($categorie)) {
            $_SESSION['error'] = "Vous devez sélectionner une catégorie ou en créer une nouvelle.";
            header("Location: /service/editServ/" . $id);
            exit();
        }

        // Préparation des données pour la mise à jour
        $name = $_POST['name'];
        $description = $_POST['description'];
        $duree = $_POST['duree'];
        $tarifs = $_POST['tarifs'];
        $horaires = $_POST['horaires'];

        // Gestion de l'upload des images via Cloudinary
        $image = $service['image'];
        $image2 = $service['image2'];

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

        // Mise à jour dans la base de données
        if ($serviceModel->updateService($id, $name, $description, $categorie, $duree, $tarifs, $horaires, $image, $image2)) {
            $_SESSION['success'] = "Service modifié avec succès.";
            header("Location: /service/listservices");
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de la modification du service.";
        }
    }

    $title = "Modifier un service";
    $this->render('service/edit_serv', compact('service', 'allCategories', 'title'));
}

    

    public function listservices()
    {
        $serviceModel = new ServiceModel();
        $services = $serviceModel->findAll(); // Récupérer tous les services

        $title = "Liste des services";
        $this->render('service/liste_services', compact('services', 'title'));
    }

    public function deleteServ($id)
    {
        $serviceModel = new ServiceModel();
        
        $service = $serviceModel->find($id);
        if ($service) {
            $serviceModel->delete($id);
            $_SESSION['success'] = "Le service a été supprimé avec succès.";
        } else {
            $_SESSION['error'] = "Le service que vous essayez de supprimer n'existe pas.";
        }

        header("Location: /service/listservices");
        exit;
    }
}

