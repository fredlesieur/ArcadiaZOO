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
}
