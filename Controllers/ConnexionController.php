<?php

namespace App\Controllers;

use App\Models\ConnexionModel;

class ConnexionController extends Controller
{
    public function index()
    {
        // Afficher le formulaire de connexion avec le titre
        $title = "Connexion";
        $this->render("connexion/index", compact("title"));
    }

    public function login(): void
{
    $email = $_POST['email'] ?? null;
    $password = $_POST['mdp'] ?? null;

    // Modèle de connexion
    $connexionModel = new ConnexionModel();
    $user = $connexionModel->findUserByEmail($email);

    // Si l'utilisateur existe et que le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // Vérification stricte du rôle
        if ($user['role'] === 'administrateur' || $user['role'] === 'veterinaire' || $user['role'] === 'employe') {
            // Stocker les informations nécessaires dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_nom_prenom'] = $user['nom_prenom']; // Stocker le nom complet

            // Redirection selon le rôle
            header("Location: /dashboard/index");
            exit;
        } else {
            $error = "Accès refusé. Rôle non valide.";
            $this->render('connexion/index', compact('error'));
        }
    } else {
        // Si l'utilisateur n'existe pas ou que le mot de passe est incorrect
        $error = "Email ou mot de passe incorrect.";
        $this->render('connexion/index', compact('error'));
    }
}


    public function logout()
    {
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Détruire toutes les variables de session
        $_SESSION = [];

        // Détruire la session
        session_destroy();

        // Redirection vers la page d'accueil des visiteurs
        header("Location: /");
        exit;
    }
    public function addUser()
    {
        // Vérifier que la requête est bien de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $connexionModel = new ConnexionModel();
        
            // Vérifier que l'email est présent dans $_POST avant de l'utiliser
            if (isset($_POST['email'])) {
                // Vérifier si l'email existe déjà
                if ($connexionModel->emailExists($_POST['email'])) {
                    $_SESSION['error'] = "L'email est déjà utilisé.";
                    header("Location: /connexion/addUser");
                    exit();
                }
    
                // Récupération et conversion du role_id
                $roleId = (int)$_POST['role_id'];
    
                // Hacher le mot de passe
                $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                // Préparer les données envoyées via le formulaire sous forme de tableau
                $data = [
                    'nom_prenom' => $_POST['nom_prenom'],
                    'email' => $_POST['email'],
                    'password' => $passwordHash,
                    'role_id' => $roleId
                ];
    
                // Hydratation de l'objet avec les données du formulaire
                $connexionModel->hydrate($data);
    
                // Insertion dans la base de données
                $connexionModel->create();
    
                $_SESSION['success'] = "Le compte utilisateur a été créé avec succès.";
                header("Location: /connexion/listUsers");
                exit();
            } else {
                // Gérer le cas où l'email n'est pas présent dans $_POST
                $_SESSION['error'] = "Le champ email est requis.";
            }
        }
    
        $title = "Créer un utilisateur";
        $this->render('connexion/add_user', compact('title'));
    }
    
    
    public function editUser($id)
{
    $connexionModel = new ConnexionModel();
    $users = $connexionModel->find($id);

    // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // prépare les données envoyées via le formulaire sous forme de tableau
        $data = [
            'nom_prenom' => $_POST['nom_prenom'],
            'email' => $_POST['email'],
            'role_id' => $_POST['role']
        ];
        // Hydratation de l'objet connexion avec les données du formulaire
        $connexionModel->hydrate($data);

        // Mettre à jour l'utilisateur
        $connexionModel->update($id);

        // Redirection après modification
        $_SESSION['success'] = "Utilisateur modifié avec succès.";
        header("Location: /connexion/listUsers");
        exit;
    }

    // Afficher le formulaire de modification
    $title = "Modifier un utilisateur";
    $this->render('connexion/edit_user', compact('users', 'title'));
}
    public function deleteUser($id)
    {
        $connexionModel = new ConnexionModel();
        $connexionModel->delete($id);

        // Redirection après suppression
        $_SESSION['success'] = "Utilisateur supprimé avec succès.";
        header("Location: /connexion/listUsers");
        exit;
    }

    public function listUsers()
    {
        // Utilisation du modèle pour récupérer tous les utilisateurs
        $connexionModel = new ConnexionModel();
        $users = $connexionModel->findAll(); // Récupérer tous les utilisateurs
    
        $title = "Liste des utilisateurs";
        // Passer les utilisateurs à la vue
        $this->render('connexion/liste_users', compact('users', 'title'));
    }
}
