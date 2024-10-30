<?php

namespace App\Controllers;

use App\Models\CloudinaryModel;

class CloudinaryController extends Controller
{
    private $cloudinaryModel;

    public function __construct()
    {
        // Initialisation du modèle Cloudinary
        $this->cloudinaryModel = new CloudinaryModel();
    }

    public function testUpload()
    {
        // Chemin vers une image de test dans le dossier assets/images
        $imagePath = ROOT . '/Public/assets/images/aigle.webp';

        // Appel de la fonction d'upload via le modèle
        $uploadResult = $this->cloudinaryModel->uploadImage($imagePath);

        // Appel de la méthode render en passant les données directement
        $this->render("testCloudinary", ["uploadResult" => $uploadResult]);
    }
    public function testEnv()
{
    echo 'Cloud Name: ' . getenv('cloud_name') . '<br>';
    echo 'API Key: ' . getenv('api_key') . '<br>';
    echo 'API Secret: ' . getenv('api_secret') . '<br>';

     $this->render("testCloudinary");
}
}
