<?php

namespace App\Controllers;

use App\Models\CoordonneeModel;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\HoraireModel;


class ContactController extends Controller
{

    public function index() {
        try {
            // Utiliser la classe MongoDb pour la connexion à MongoDB
            $mongo = new HoraireModel();
            $horaires = $mongo->findAll();

        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage() . "<br>";
            echo "Trace de l'erreur : " . $e->getTraceAsString();
        }

        // Récupération des coordonnées (MySQL)
        $CoordonneeModel = new CoordonneeModel;
        $coordonnees = $CoordonneeModel->findAll();

        $this->render("contact/index", compact("horaires", "coordonnees"));
    }

    // Fonction pour ajouter un horaire
    public function addHoraire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
               
                $mongo = new HoraireModel();

                // Créer un nouvel horaire
                $saison = $_POST['saison'];
                $semaine = $_POST['semaine'];
                $week_end = $_POST['week_end'];

                $mongo->add_horaire($saison, $semaine, $week_end);
                $_SESSION['success'] = "L'horaire a été ajouté avec succès.";
                header("Location: /contact/index");
                exit();
            } catch (Exception $e) {
                echo "Erreur MongoDB : " . $e->getMessage();
            }
        }

      
        $this->render('contact/add_horaire');
    }


   // Fonction pour modifier un horaire
public function editHoraire($id) {

    $mongo = new HoraireModel();

    // Récupérer l'horaire à modifier (ceci renvoie un document BSON)
    $horaire = $mongo->find($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Récupérer les données du formulaire
            $id = $_POST['id'];  // ID envoyé via un champ caché
            $saison = $_POST['saison'];
            $semaine = $_POST['semaine'];
            $week_end = $_POST['week_end'];

            // Utiliser le modèle pour mettre à jour l'horaire (ne pas appeler edit_horaire sur le document)
            $mongo->edit_horaire($id, $saison, $semaine, $week_end);  // Appeler sur l'objet modèle $mongo
            $_SESSION['success'] = "L'horaire a été mis à jour avec succès.";
            header("Location: /contact/index");
            exit();
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
        }
    }

  
    $this->render('contact/edit_horaire', compact('horaire'));
}

    // Fonction pour lister les horaires
    public function listHoraires() {
        try {
            $mongo = new HoraireModel();
            $horaires = $mongo->findAll();
            
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
            return;
        }

        $this->render('contact/liste_horaires', compact('horaires'));
    }

 
    public function deleteHoraire($id) {
        try {
            // Utilise la classe MongoDb pour la connexion à MongoDB
            $mongo = new HoraireModel();
            
            // Supprime l'horaire correspondant à l'ID
            $mongo->delete_horaire($id);
            
            $_SESSION['success'] = "L'horaire a été supprimé avec succès.";
            header("Location: /contact/index");
            exit();
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
        }
    }

    // Envoyer un e-mail via le formulaire de contact
  
    public function sendMail() {
        $message = '';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $messageContent = $_POST['message'];
    
            // Instanciation de PHPMailer
            $mail = new PHPMailer(true);
    
            try {
                // Configuration SMTP
                $mail->isSMTP();
                $mail->Host = $_ENV['SMTP_HOST']; 
                $mail->SMTPAuth = true;  
                $mail->Username = $_ENV['SMTP_USER'];
                $mail->Password = $_ENV['SMTP_PASS']; 
                $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
                $mail->Port = $_ENV['SMTP_PORT']; 
    
                $mail->setFrom('noreply@arcadia.fr', 'Arcadia Contact');
                $mail->addReplyTo($email, $nom . ' ' . $prenom);
                $mail->addAddress('woody91420@gmail.com', 'Arcadia');
    
                $mail->isHTML(true);
                $mail->Subject = 'Nouveau message de contact';
                $mail->Body = "
                    <h3>Nouveau message de contact</h3>
                    <p><strong>Nom :</strong> {$nom}</p>
                    <p><strong>Prénom :</strong> {$prenom}</p>
                    <p><strong>Email :</strong> {$email}</p>
                    <p><strong>Message :</strong></p>
                    <p>{$messageContent}</p>
                ";
    
                $mail->send();
                $message = 'Votre message a été envoyé avec succès.';
            } catch (Exception $e) {
                $message = "L'envoi du message a échoué. Erreur: " . $mail->ErrorInfo;
            }
        }
    
        // Charger les coordonnées
        $CoordonneeModel = new CoordonneeModel();
        $coordonnees = $CoordonneeModel->findAll();
    
        // Charger les horaires depuis MongoDB
        try {
            $mongo = new HoraireModel();
            $horaires = $mongo->findAll();
        } catch (Exception $e) {
            $horaires = []; // En cas d'erreur, utiliser un tableau vide
        }
    
        $this->render('contact/index', compact('message', 'coordonnees', 'horaires'));
    }
    
}

