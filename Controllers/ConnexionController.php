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

    public function login()
    {
        // Récupérer les données du formulaire
        $email = $_POST['email'];
        $password = $_POST['mdp'];

        // Modèle de connexion
        $connexionModel = new ConnexionModel();
        $user = $connexionModel->findBy(['email' => $email]);

        // Si l'utilisateur existe et que le mot de passe est correct
        if ($user && password_verify($password, $user[0]['password'])) {
            // Vérifier le rôle de l'utilisateur
            if (in_array($user[0]['role'], ['administrateur', 'veterinaire', 'employe'])) {
                // Démarrer la session et stocker les informations de l'utilisateur
                session_start();
                $_SESSION['user_id'] = $user[0]['id'];
                $_SESSION['role'] = $user[0]['role'];

                // Rediriger vers le tableau de bord approprié
                header("Location: /dashboard");
                exit();
            } else {
                // Afficher un message d'erreur pour un rôle non valide
                $error = "Accès refusé. Rôle non valide.";
                $this->render("connexion/index", compact("error"));
            }
        } else {
            // Afficher un message d'erreur pour email ou mot de passe incorrect
            $error = "Email ou mot de passe incorrect.";
            $this->render("connexion/index", compact("error"));
        }
    }
    public function logout()
    {
        session_start();
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session

        // Rediriger vers la page d'accueil (ou page de ton choix)
        header("Location: /");
        exit();
    }
}

