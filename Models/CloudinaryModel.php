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
    
            // Chaîne de signature sans problème de caractères spéciaux
            $signatureString = "folder=test_folder&timestamp=" . $timestamp;
    
            // Vérification de la chaîne de signature avant le hachage
            error_log("Chaîne de signature : " . $signatureString);
    
            // Génération de la signature en utilisant la clé correcte de $_ENV
            $signature = hash_hmac('sha256', $signatureString, $_ENV['api_secret']);
    
            // Vérification de la signature générée pour le débogage
            error_log("Signature générée : " . $signature);
    
            // Téléchargement avec les paramètres générés
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder'    => 'test_folder',
                'timestamp' => $timestamp,
                'signature' => $signature,
                'api_key'   => $_ENV['api_key']
            ]);
    
            return $result;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    
}
