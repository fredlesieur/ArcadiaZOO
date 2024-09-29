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
    $email = $_POST['email'];
    $password = $_POST['mdp'];

    // Modèle de connexion
    $connexionModel = new ConnexionModel();
    $user = $connexionModel->findUserByEmail($email);

    // Si l'utilisateur existe et que le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // Vérification stricte du rôle
        if ($user['role'] === 'administrateur' || $user['role'] === 'veterinaire' || $user['role'] === 'employe') {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirection selon le rôle
            if ($user['role'] === 'administrateur') {
                header("Location: /admin/index");
            } elseif ($user['role'] === 'veterinaire') {
                header("Location: /veterinaire/index");
            } elseif ($user['role'] === 'employe') {
                header("Location: /employe/index");
            }
            exit;
        } else {
            $error = "Accès refusé. Rôle non valide.";
            $this->render('connexion/index', compact('error'));
        }
    } else {
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

}

