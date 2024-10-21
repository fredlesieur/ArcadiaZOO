<?php

namespace App\Controllers;

use App\Models\CoordonneeModel;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\HoraireModel;
use MongoDB\BSON\ObjectId;

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

        // Passer les horaires et les coordonnées à la vue
        $this->render("contact/index", compact("horaires", "coordonnees"));
    }

    // Fonction pour ajouter un horaire
    public function addHoraire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Utiliser la classe MongoDb
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

        // Afficher le formulaire pour ajouter un nouvel horaire
        $this->render('contact/add_horaire');
    }

    // Fonction pour éditer un horaire
   // Fonction pour éditer un horaire
public function editHoraire($id) {

    $mongo = new HoraireModel(); // Instance du modèle Mongo

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

    // Passer l'horaire à la vue pour modification
    $this->render('contact/edit_horaire', compact('horaire'));
}

    // Afficher la liste des horaires
    public function listHoraires() {
        try {
            $mongo = new HoraireModel();
            $horaires = $mongo->findAll();
            
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
            return;
        }

        // Passer les horaires à la vue
        $this->render('contact/liste_horaires', compact('horaires'));
    }

    // Supprimer un horaire
    public function deleteHoraire($id) {
        try {
            // Utiliser la classe MongoDb pour la connexion à MongoDB
            $mongo = new HoraireModel();
            
            // Supprimer l'horaire correspondant à l'ID
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
                // Configuration du serveur SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'tonemail@gmail.com'; 
                $mail->Password = 'tonpassword'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Destinataire
                $mail->setFrom($email, $nom . ' ' . $prenom);
                $mail->addAddress('tonautremail@gmail.com');

                // Contenu de l'e-mail
                $mail->isHTML(true);
                $mail->Subject = 'Nouveau message de contact';
                $mail->Body    = "
                    <h3>Nouveau message de contact</h3>
                    <p><strong>Nom :</strong> {$nom}</p>
                    <p><strong>Prénom :</strong> {$prenom}</p>
                    <p><strong>Email :</strong> {$email}</p>
                    <p><strong>Message :</strong></p>
                    <p>{$messageContent}</p>
                ";

                // Envoi de l'e-mail
                $mail->send();
                $message = 'Votre message a été envoyé avec succès.';
            } catch (Exception $e) {
                $message = "L'envoi du message a échoué. Erreur: {$mail->ErrorInfo}";
            }
        }

        // Transmettre le message à la vue
        $horaires = [];  // Passer les horaires vides si nécessaire
        $this->render('contact/index', compact('message', 'horaires'));
    }
}
