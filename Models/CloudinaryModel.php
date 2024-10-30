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

        // Création d'un tableau pour éviter toute substitution
        $params = [
            'folder' => 'test_folder',
            'timestamp' => $timestamp
        ];

        // Reconstitution manuelle de la chaîne de signature en utilisant http_build_query
        $signatureString = implode('&', [
            'folder=' . $params['folder'],
            'timestamp=' . $params['timestamp']
        ]);

        // Log pour vérifier la chaîne avant le hachage
        error_log("Chaîne de signature avant hachage : " . $signatureString);

        // Génération de la signature
        $signature = hash_hmac('sha256', $signatureString, $_ENV['api_secret']);

        // Log pour vérifier la signature générée
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
