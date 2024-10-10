<?php

namespace App\Controllers;
use App\Models\ServiceModel;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceModel = new ServiceModel();

        // Récupère tous les services
        $services = $serviceModel->findAll();

        // Récupérer les services par catégorie si nécessaire
        $restaurant = $serviceModel->findBy(['categorie' => 'restaurant']);
        $train = $serviceModel->findBy(['categorie' => 'train']);
        $visites = $serviceModel->findBy(['categorie' => 'visite']);

        // Passer les données à la vue
        $this->render("service/index", compact("services", "restaurant", "train", "visites"));
    }

    public function addServ()
    {

        $serviceModel = new ServiceModel();
    
        // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Préparer les données envoyées via le formulaire sous forme de tableau 
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'categorie' => $_POST['categorie'],
                'image' => $_POST['image'],
                'image2' => $_POST['image2'],
                'duree' => $_POST['duree'],
                'tarifs' => $_POST['tarifs'],
                'horaires' => $_POST['horaires']
            ];

            // Hydratation de l'objet rapport avec les données du formulaire
            $serviceModel->hydrate($data);

            // Redirection vers la liste des animaux après l'ajout
            $serviceModel->create();
            header("Location: /service/listServices");
            exit();    
        }
            $title = "Ajouter un service";
            $this->render('service/add_serv', compact('title'));
    }
    
    public function editserv($id)
    {
        $servModel = new ServiceModel();
        $services= $servModel->find($id);
    
        // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // prépare les données envoyées via le formulaire sous forme de tableau
            $data = [
               'name' => $_POST['name'],
                'description' => $_POST['description'],
                'categorie' => $_POST['categorie'],
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
            header("Location: /service/listServices");
            exit;
        }
    
        // Afficher le formulaire de modification
        $title = "Modifier un utilisateur";
        $this->render('service/edit_serv', compact('services', 'title'));
    }

    public function listservices()
    {
        // Utilisation du modèle pour récupérer tous les animaux
        $serviceModel = new ServiceModel();
        $services = $serviceModel->findAll(); // Récupérer tous les animaux
    
        $title = "Liste des services";
        // Passer les utilisateurs à la vue
        $this->render('service/liste_services', compact('services', 'title'));
    }

    public function deleteServ($id)
    {
        $servModel = new ServiceModel();
        $servModel->delete($id);

        // Redirection après suppression
        $_SESSION['success'] = "Utilisateur supprimé avec succès.";
        header("Location: /service/listservices");
        exit;
    }

}
