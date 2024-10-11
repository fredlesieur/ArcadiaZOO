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
        $connexionModel = new ConnexionModel();

        

        // Déterminer le rôle : 3 pour employé, 2 pour vétérinaire
        $roleId = ('role' === 'employe') ? 3 : 2;
        //verifie qu'il n y ai pas le même mail
        if ($connexionModel->emailExists('email')) {
            // Si l'email existe, afficher un message d'erreur
            $_SESSION['error'] = "L'email est déjà utilisé.";
            header("Location: /connexion/addUser");
            exit();
        }

        // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           // Si l'email n'existe pas, continuer la création
            $passwordhash = $_POST['password']; // Préparer les données envoyées via le formulaire sous forme de tableau
            $passwordHash = password_hash('password', PASSWORD_DEFAULT); // Préparer les données envoyées via le formulaire sous forme de tableau  

            $data = [
                'nom_prenom' => $_POST['nom_prenom'],
                'email' => $_POST['email'],
                'password' => $passwordHash,
                'role_id' => $_POST['role']
            ];


            // Hydratation de l'objet rapport avec les données du formulaire
            $connexionModel->hydrate($data);

            // Mise à jour du rapport dans la base de données
            $connexionModel->create();

            // Redirection vers la liste des utilisateurs après l'ajout
            $_SESSION['success'] = "Le compte utilisateur a été créé avec succès.";
            header("Location: /connexion/listUsers");
            exit();
        }
         //vue du formulaire d'ajout
         $title = "Créer un utilisateur";
         $this->render('connexion/add_user', compact('title'));
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


}
