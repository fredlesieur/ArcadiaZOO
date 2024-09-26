<?php

use App\Models\ConnexionModel;

// Créer une instance de ConnexionModel
$connexionModel = new ConnexionModel();

// Insérer un nouvel administrateur
$email = 'fred.lesieur@hotmail.fr';
$password = 'Fred75@';

// Appeler la méthode pour créer l'admin
if ($connexionModel->createAdmin($email, $password)) {
    echo "Compte administrateur créé avec succès !";
} else {
    echo "Erreur lors de la création du compte administrateur.";
}
