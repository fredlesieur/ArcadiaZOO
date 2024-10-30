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
        $timestamp = time();
        $params = [
            'folder' => 'test_folder',
            'timestamp' => $timestamp
        ];
    
        // Chaîne de signature pour tester l'encodage
        $signatureString = implode('&', [
            'folder=' . $params['folder'],
            'timestamp=' . $params['timestamp']
        ]);
    
        // Log pour afficher la chaîne et voir si `&` se transforme en `×`
        error_log("Chaîne de signature pour test : " . $signatureString);
 
}

}