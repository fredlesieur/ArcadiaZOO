<?php

namespace App\Controllers;

use App\Models\CoordonneeModel;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use MongoDB\Client as MongoClient;
use MongoDB\BSON\ObjectId;

class ContactController extends Controller
{

    public function index() {
        try {
            // Connexion à MongoDB sur Heroku
            $mongoClient = new MongoClient($_ENV['MONGO_URI'], [
                'ssl' => true,
                'tlsAllowInvalidCertificates' => true,
                'tlsAllowInvalidHostnames' => true
            ]);
            $db = $mongoClient->arcadia;
            echo "Connexion à MongoDB réussie";

            // Récupérer les horaires
            $horairesCollection = $db->horaires;
            $horaires = [];
            foreach ($horairesCollection->find() as $horaire) {
                $horaires[] = (array) $horaire;
            }
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
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
                $mongoClient = new MongoClient($_ENV['MONGO_URI'], [
                    'ssl' => true,
                    'tlsAllowInvalidCertificates' => true
                ]);
                
                $db = $mongoClient->arcadia;
                $horairesCollection = $db->horaires;

                // Créer un nouvel horaire
                $data = [
                    'saison' => $_POST['saison'],
                    'semaine' => $_POST['semaine'],
                    'week_end' => $_POST['week_end']
                ];

                $horairesCollection->insertOne($data);
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
    public function editHoraire($id) {
        $mongoClient = new MongoClient($_ENV['MONGO_URI'], [
            'ssl' => true,
            'tlsAllowInvalidCertificates' => true
        ]);
        
        $db = $mongoClient->arcadia;
        $horairesCollection = $db->horaires;

        // Récupérer l'horaire à modifier
        $horaire = $horairesCollection->findOne(['_id' => new ObjectId($id)]);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'saison' => $_POST['saison'],
                    'semaine' => $_POST['semaine'],
                    'week_end' => $_POST['week_end']
                ];

                // Mettre à jour l'horaire
                $horairesCollection->updateOne(['_id' => new ObjectId($id)], ['$set' => $data]);
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
            $mongoClient = new MongoClient($_ENV['MONGO_URI'], [
                'ssl' => true,
                'tlsAllowInvalidCertificates' => true
            ]);
            
            $db = $mongoClient->arcadia;
            $horairesCollection = $db->horaires;

            // Récupérer tous les horaires
            $horaires = [];
            foreach ($horairesCollection->find() as $horaire) {
                $horaires[] = (array) $horaire;
            }
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
            return;
        }

        // Passer les horaires à la vue
        $this->render('contact/liste_horaires', compact('horaires'));
    }

    // Supprimer un horaire
    public function deleteHoraire($id) {
        $mongoClient = new MongoClient($_ENV['MONGO_URI'], [
            'ssl' => true,
            'tlsAllowInvalidCertificates' => true
        ]);
        
        $db = $mongoClient->arcadia;
        $horairesCollection = $db->horaires;

        try {
            // Supprimer l'horaire
            $horairesCollection->deleteOne(['_id' => new ObjectId($id)]);
            $_SESSION['success'] = "L'horaire a été supprimé avec succès.";
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
        }

        header("Location: /contact/index");
        exit();
    }

    // Envoyer un e-mail
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
