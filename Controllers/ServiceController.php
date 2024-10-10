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
        $services = $serviceModel->findAll();
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
        // Préparer les données envoyées via le formulaire
        $categorie = $_POST['categorie'] == 'autre' ? $_POST['new-category'] : $_POST['categorie'];

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'categorie' => $categorie,
            'image' => $_POST['image'],
            'image2' => $_POST['image2'],
            'duree' => $_POST['duree'],
            'tarifs' => $_POST['tarifs'],
            'horaires' => $_POST['horaires']
        ];

        $serviceModel->hydrate($data);
        $serviceModel->create();
        header("Location: /service/listServices");
        exit();    
    }
    $title = "Ajouter un service";
    $this->render('service/add_serv', compact('title', 'categories'));
}
public function editserv($id)
{
    $servModel = new ServiceModel();
    $service = $servModel->find($id);

    // Récupérer toutes les catégories existantes pour les afficher dans le menu déroulant
    $allCategories = $servModel->getAllCategories();

    // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Prépare les données envoyées via le formulaire sous forme de tableau
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'categorie' => $_POST['new-category'] ?? $_POST['categorie'],
            'image' => $_POST['image'],
            'image2' => $_POST['image2'],
            'duree' => $_POST['duree'],
            'tarifs' => $_POST['tarifs'],
            'horaires' => $_POST['horaires']
        ];
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
    // Utilisation du modèle pour récupérer tous les services
    $serviceModel = new ServiceModel();
    $services = $serviceModel->findAll(); // Récupérer tous les services

    $title = "Liste des services";
    // Passer les services à la vue pour affichage
    $this->render('service/liste_services', compact('services', 'title'));
}

public function deleteServ($id)
{
    $serviceModel = new ServiceModel();
    
    // Vérifier si le service existe avant de le supprimer
    $service = $serviceModel->find($id);
    if ($service) {
        // Supprimer le service de la base de données
        $serviceModel->delete($id);

        // Ajouter un message de succès dans la session
        $_SESSION['success'] = "Le service a été supprimé avec succès.";
    } else {
        // Si le service n'existe pas, ajouter un message d'erreur
        $_SESSION['error'] = "Le service que vous essayez de supprimer n'existe pas.";
    }

    // Rediriger vers la liste des services
    header("Location: /service/listservices");
    exit;
}

}
