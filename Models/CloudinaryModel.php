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
            $timestamp = time();  
            $params = [
                'folder' => 'test_folder',
                'timestamp' => $timestamp,
            ];
    
            $dataToSign = "folder=test_folder&timestamp=$timestamp";
            $signature = hash_hmac('sha256', $dataToSign, $_ENV['api_secret']);
    
            // Ajout de debug pour vérifier les valeurs
            echo "Data to Sign: $dataToSign\n";
            echo "Generated Signature: $signature\n";
    
            $params['signature'] = $signature;
            $params['api_key'] = $_ENV['api_key'];
    
            $result = $this->cloudinary->uploadApi()->upload($imagePath, $params);
            return $result;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    

}
