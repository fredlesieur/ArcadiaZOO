<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\CoordonneeModel;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends Controller
{
    public function index()
    {
        $ContactModel = new ContactModel;
        $horaires = $ContactModel->findAll();

        $CoordonneeModel = new CoordonneeModel;
        $coordonnees = $CoordonneeModel->findAll();

        $this->render("contact/index", compact("horaires", "coordonnees"));
    }

    public function sendMail()
    {
        $message = ''; // Initialisation du message

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
                $mail->Username = 'woody91420@gmail.com'; // Ton adresse Gmail
                $mail->Password = 'dmcyedgxthefavup'; // Ton mot de passe d'application Gmail
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Destinataire
                $mail->setFrom($email, $nom . ' ' . $prenom); // Email et nom saisis dans le formulaire
                $mail->addAddress('fred.lesieur@hotmail.fr'); // Adresse où tu veux recevoir le message

                // Contenu de l'email
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

                // Envoi de l'email
                $mail->send();
                $message = 'Votre message a été envoyé avec succès.';
            } catch (Exception $e) {
                $message = "L'envoi du message a échoué. Erreur: {$mail->ErrorInfo}";
            }
        }

        // Transmettre le message à la vue
        $this->render('contact/index', compact('message'));
    }
}
