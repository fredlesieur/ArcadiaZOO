<?php
namespace App\Models;

use Cloudinary\Cloudinary;
use Exception;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
{
    // Debug temporaire pour vérifier la valeur de cloud_name
    error_log("Cloud Name: " . $_ENV['cloud_name']);

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
