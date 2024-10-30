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
    
            // Construction manuelle de la chaîne de signature pour éviter tout remplacement
            $signatureString = 'folder=test_folder' . chr(38) . 'timestamp=' . $timestamp;
    
            // Log de débogage pour vérifier la chaîne de signature
            error_log("Chaîne de signature avant hachage : " . $signatureString);
    
            // Génération de la signature
            $signature = hash_hmac('sha256', $signatureString, $_ENV['api_secret']);
    
            // Log de débogage pour vérifier la signature
            error_log("Signature générée : " . $signature);
    
            // Envoi de la requête à Cloudinary
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
