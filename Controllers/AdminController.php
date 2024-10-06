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
            $nom_prenom = $_POST['nom_prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
    
            // Utilisation du modèle pour vérifier si l'email existe déjà
            $connexionModel = new ConnexionModel();
            if ($connexionModel->emailExists($email)) {
                // Si l'email existe, afficher un message d'erreur
                $_SESSION['error'] = "L'email est déjà utilisé.";
                header("Location: /admin/creerUtilisateur");
                exit;
            }
    
            // Si l'email n'existe pas, continuer la création
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
            // Déterminer le rôle : 3 pour employé, 2 pour vétérinaire
            $roleId = ($role === 'employe') ? 3 : 2;
    
            $connexionModel->createUser(nom_prenom: $nom_prenom, email: $email, password: $passwordHash, role_id: $roleId);
    
            // Redirection vers la liste des utilisateurs après la création
            $_SESSION['success'] = "Le compte utilisateur a été créé avec succès.";
            header("Location: /admin/listUsers");
            exit;
        }
    }
    
    public function listUsers()
{
    // Utilisation du modèle pour récupérer tous les utilisateurs
    $connexionModel = new ConnexionModel();
    $users = $connexionModel->getAllUsers(); // Récupérer tous les utilisateurs

    // Passer les utilisateurs à la vue
    $this->render('admin/listUsers', compact('users'));
}

public function editUser($id)
{
    $connexionModel = new ConnexionModel();
    $user = $connexionModel->find($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $data = [
            'nom_prenom' => $_POST['nom_prenom'],
            'email' => $_POST['email'],
            'role_id' => $_POST['role']
        ];

        // Mettre à jour l'utilisateur
        $connexionModel->updateUser($id, $data);

        // Redirection après modification
        $_SESSION['success'] = "Utilisateur modifié avec succès.";
        header("Location: /admin/listUsers");
        exit;
    }

    // Afficher le formulaire de modification
    $this->render('admin/editUser', compact('user'));
}
public function deleteUser($id)
{
    $connexionModel = new ConnexionModel();
    $connexionModel->delete($id);

    // Redirection après suppression
    $_SESSION['success'] = "Utilisateur supprimé avec succès.";
    header("Location: /admin/listUsers");
    exit;
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
