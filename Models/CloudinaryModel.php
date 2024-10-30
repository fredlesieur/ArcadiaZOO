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
    <?php

    namespace App\Models;
    
    use Cloudinary\Cloudinary;
    
    class CloudinaryModel
    {
        private $cloudinary;
    
        public function __construct()
        {
            // Initialisation Cloudinary avec les paramètres des variables d'environnement
            $this->cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => $_ENV['cloud_name'],
                    'api_key'    => $_ENV['api_key'],
                    'api_secret' => $_ENV['api_secret'],
                ]
            ]);
        }
    
        public function uploadImage($imagePath)
        {
            $timestamp = time();
            
            // Génération de la signature pour le test
            $signatureString = "folder=test_folder&timestamp=$timestamp";
            $signature = hash_hmac('sha256', $signatureString, $_ENV['api_secret']);
            
            try {
                $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                    'folder' => 'test_folder',
                    'timestamp' => $timestamp,
                    'signature' => $signature,
                    'api_key' => $_ENV['api_key'],
                ]);
    
                return $result;
            } catch (\Exception $e) {
                return ['error' => $e->getMessage()];
            }
        }
    }
    
    

}