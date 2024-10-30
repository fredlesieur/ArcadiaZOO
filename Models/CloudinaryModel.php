<?php
namespace App\Models;

use Cloudinary\Cloudinary;
use Exception;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        // Configuration Cloudinary avec les variables d’environnement
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'] ?? $_ENV['cloud_name'],
                'api_key'    => $_ENV['CLOUDINARY_API_KEY'] ?? $_ENV['api_key'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET'] ?? $_ENV['api_secret']
            ]
        ]);
    }

    public function uploadImage($imagePath)
    {
        try {
           
            // Upload de l'image dans le dossier 'test_folder'
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder' => 'test_folder',
           
            ]);

            return $result;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
