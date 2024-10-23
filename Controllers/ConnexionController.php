<?php

namespace App\Controllers;

use App\Models\ConnexionModel;
use Exception;

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

            // Vérifier qu'il n'existe qu'un seul administrateur
            if ($_POST['role_id'] == 1 && $connexionModel->adminExists()) {
                $_SESSION['error'] = "Il ne peut y avoir qu'un seul administrateur.";
                header("Location: /connexion/addUser");
                exit();
            }

            // Hacher le mot de passe
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Préparer les données
            $data = [
                'nom_prenom' => $_POST['nom_prenom'],
                'email' => $_POST['email'],
                'password' => $passwordHash,
                'role_id' => (int)$_POST['role_id']
            ];

            // Hydratation de l'objet avec les données du formulaire
            $connexionModel->hydrate($data);

            // Insertion dans la base de données
            $connexionModel->create();

            // Envoi de l'email à l'utilisateur
            $this->sendAccountCreationEmail($data['email'], $data['nom_prenom']);

            $_SESSION['success'] = "Le compte utilisateur a été créé avec succès et l'identifiant a été envoyé par email.";
            header("Location: /connexion/listUsers");
            exit();
        }
    }

    $title = "Créer un utilisateur";
    $this->render('connexion/add_user', compact('title'));
}

// Méthode pour envoyer l'email avec PHPMailer
private function sendAccountCreationEmail($email, $nom_prenom)
{
    // Instanciation de PHPMailer
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();  
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;  
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port = $_ENV['SMTP_PORT'];

        // Expéditeur et destinataire
        $mail->setFrom('noreply@arcadia.fr', 'Arcadia');
        $mail->addAddress($email, $nom_prenom);  // Envoyer l'email à l'utilisateur

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Votre compte a été créé';
        $mail->Body = "
            <h3>Bienvenue sur Arcadia</h3>
            <p>Bonjour {$nom_prenom},</p>
            <p>Votre compte a été créé avec succès.</p>
            <p>Votre identifiant est : <strong>{$email}</strong></p>
            <p>Merci de vous connecter pour finaliser votre inscription.</p>
        ";

        // Envoyer l'e-mail
        $mail->send();
    } catch (Exception $e) {
        // Gestion des erreurs d'envoi d'e-mail
        $_SESSION['error'] = "L'e-mail de confirmation n'a pas pu être envoyé. Erreur: " . $mail->ErrorInfo;
    }
}

public function editUser($id)
{
    $connexionModel = new ConnexionModel();
    $users = $connexionModel->find($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Empêcher la modification du rôle administrateur
        if ($users['role_id'] == 1) {
            $_POST['role_id'] = 1;  // Forcer le rôle administrateur à rester inchangé
        }

        $data = [
            'nom_prenom' => $_POST['nom_prenom'],
            'email' => $_POST['email'],
            'role_id' => $_POST['role']
        ];

        $connexionModel->hydrate($data);
        $connexionModel->update($id);

        $_SESSION['success'] = "Utilisateur modifié avec succès.";
        header("Location: /connexion/listUsers");
        exit();
    }

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
