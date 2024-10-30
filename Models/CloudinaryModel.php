<?php

namespace App\Models;

use Cloudinary\Cloudinary;
use Exception;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['cloud_name'],
                'api_key'    => $_ENV['api_key'],
                'api_secret' => $_ENV['api_secret']
            ]
        ]);
    }

    public function uploadImage($imagePath)
{
    try {
        $timestamp = time();  // Assurez-vous que le timestamp est bien généré
        $params = [
            'folder' => 'test_folder',
            'timestamp' => $timestamp,
        ];

        // Correction : génération de la signature en format de chaîne valide
        $dataToSign = "folder=test_folder&timestamp=$timestamp";
        $signature = hash_hmac('sha1', $dataToSign, $_ENV['CLOUDINARY_API_SECRET']);

        // Ajout de la signature et de l'API Key dans les paramètres
        $params['signature'] = $signature;
        $params['api_key'] = $_ENV['CLOUDINARY_API_KEY'];

        $result = $this->cloudinary->uploadApi()->upload($imagePath, $params);
        return $result;
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}

}
