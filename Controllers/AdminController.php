<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Bienvenue José sur votre Tableau de bord";
        $this->render('admin/index', compact('title'));
    }

    // Fonction générique pour créer un utilisateur (employé ou vétérinaire)
    public function creerUtilisateur()
    {
        // Si la requête est GET, on affiche le formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $title = "Créer un utilisateur";
            $this->render('admin/creerUtilisateur', compact('title'));
        }

        // Si la requête est POST, on traite les données soumises
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // Utilisation du modèle pour créer l'utilisateur
            $connexionModel = new ConnexionModel();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Déterminer le rôle : 3 pour employé, 2 pour vétérinaire
            $roleId = ($role === 'employe') ? 3 : 2;

            $connexionModel->createUser($email, $passwordHash, $roleId);

            $_SESSION['success'] = "Le compte utilisateur a été créé avec succès.";
            header("Location: admin/index");
            exit;
        }
    }

    public function gererServices()
    {
        // Code pour gérer les services
        $title = "Gérer les services";
        $this->render('/admin/gererServices', compact('title'));
    }

    public function gererHabitats()
    {
        // Code pour gérer les habitats
        $title = "Gérer les habitats";
        $this->render('/admin/gererHabitats', compact('title'));
    }

    public function gererAnimaux()
    {
        // Code pour gérer les animaux
        $title = "Gérer les animaux";
        $this->render('/admin/gererAnimaux', compact('title'));
    }

    public function voirRapportsVeterinaires()
    {
        // Code pour voir les rapports vétérinaires
        $title = "Rapports vétérinaires";
        $this->render('/admin/voirRapportsVeterinaires', compact('title'));
    }
}
