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
        // URL d'une image de test
        $imageUrl = 'https://images.unsplash.com/photo-1618328130170-63d9f569d18b';

        // Appel de la fonction d'upload
        $uploadResult = $this->cloudinaryModel->uploadImage($imageUrl);

        // Appel de la méthode render en passant les données directement à la vue 'testUpload'
        $this->render("testUpload", ["uploadResult" => $uploadResult]);
    }
}
