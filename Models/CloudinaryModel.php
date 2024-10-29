<?php

use Cloudinary\Cloudinary;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        // Initialisation de la connexion à Cloudinary
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
                'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
            ],
        ]);
    }

    // Fonction pour uploader une image sur Cloudinary
    public function uploadImage($filePath)
    {
        return $this->cloudinary->uploadApi()->upload($filePath);
    }
}
