<?php

require 'vendor/autoload.php';
require 'Models/CloudinaryModel.php';

// Initialiser le modèle Cloudinary
$cloudinary = new CloudinaryModel();

// Chemin du fichier image à uploader (à ajuster selon ton image de test)
$filePath = 'https://upload.wikimedia.org/wikipedia/commons/4/47/American_Eagle.JPG';

try {
    // Appel de la fonction d'upload
    $response = $cloudinary->uploadImage($filePath);
    echo "Upload réussi ! URL de l'image : " . $response['secure_url'];
} catch (Exception $e) {
    echo "Erreur lors de l'upload : " . $e->getMessage();
}
