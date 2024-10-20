<?php

namespace App\Controllers;
use App\Models\ServiceModel;

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
        $categories = $serviceModel->getUniqueCategories(); // Récupère les catégories existantes
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si une catégorie est bien sélectionnée ou si une nouvelle catégorie est créée
            $categories = !empty($_POST['categorie']) && $_POST['categorie'] !== 'autre'
                ? $_POST['categorie'] // Utiliser la catégorie sélectionnée si elle est définie et différente de "autre"
                : (!empty($_POST['new-category']) ? $_POST['new-category'] : null); // Utiliser la nouvelle catégorie si elle est définie
    
            // Si aucune catégorie n'a été définie, on génère une erreur
            if (!$categories) {
                $_SESSION['error'] = "Vous devez sélectionner une catégorie ou en créer une nouvelle.";
                header("Location: /service/addServ");
                exit();
            }
    
            // Préparer les données envoyées via le formulaire
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'categorie' => $categories,
                'duree' => $_POST['duree'],
                'tarifs' => $_POST['tarifs'],
                'horaires' => $_POST['horaires']
            ];
    
            // Gestion de l'upload des images
            if (!empty($_FILES['image']['name'])) {
                $uploadedImage = $serviceModel->uploadImage($_FILES['image']);
                if ($uploadedImage) {
                    $data['image'] = $uploadedImage;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
            if (!empty($_FILES['image2']['name'])) {
                $uploadedImage = $serviceModel->uploadImage($_FILES['image2']);
                if ($uploadedImage) {
                    $data['image2'] = $uploadedImage;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
    
            // Hydrate le modèle et enregistre le service dans la base de données
            $serviceModel->hydrate($data);
            $serviceModel->create();
            header("Location: /service/listServices");
            exit();
        }
    
        $title = "Ajouter un service";
        $this->render('service/add_serv', compact('title', 'categories'));
    }
    
    public function editServ($id)
    {
        $servModel = new ServiceModel();
        $service = $servModel->find($id);
    
        // Récupérer toutes les catégories existantes pour les afficher dans le menu déroulant
        $allCategories = $servModel->getAllCategories();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si une nouvelle catégorie a été fournie ou si une catégorie existante est sélectionnée
            $categorie = !empty($_POST['new-category']) ? $_POST['new-category'] : $_POST['categorie'];
    
            // Si aucune catégorie n'est sélectionnée, affiche une erreur
            if (empty($categorie)) {
                $_SESSION['error'] = "Vous devez sélectionner une catégorie ou en créer une nouvelle.";
                header("Location: /service/editServ/" . $id);
                exit();
            }
    
            // Prépare les données envoyées via le formulaire sous forme de tableau
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'categorie' => $categorie,
                'duree' => $_POST['duree'],
                'tarifs' => $_POST['tarifs'],
                'horaires' => $_POST['horaires']
            ];
    
            // Gestion de l'upload des images
            if (!empty($_FILES['image']['name'])) {
                $uploadedImage = $servModel->uploadImage($_FILES['image']);
                if ($uploadedImage) {
                    $data['image'] = $uploadedImage;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
            if (!empty($_FILES['image2']['name'])) {
                $uploadedImage = $servModel->uploadImage($_FILES['image2']);
                if ($uploadedImage) {
                    $data['image2'] = $uploadedImage;
                } else {
                    echo "Erreur lors du téléchargement de l'image.<br>";
                }
            }
    
            // Hydratation de l'objet service avec les données du formulaire
            $servModel->hydrate($data);
    
            // Mettre à jour le service
            $servModel->update($id);
    
            // Redirection après modification
            header("Location: /service/listservices");
            exit;
        }
    
        // Afficher le formulaire de modification avec toutes les catégories
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

