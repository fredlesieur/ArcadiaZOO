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
            // Téléchargement direct avec Cloudinary, sans génération manuelle de signature
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder' => 'test_folder'
            ]);
    
            return $result;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    

}