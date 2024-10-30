<?php

namespace App\Models;

use Cloudinary\Cloudinary;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        // Configuration Cloudinary
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => getenv('cloud_name'),
                'api_key'    => getenv('api_key'),
                'api_secret' => getenv('api_secret')
            ]
        ]);
    }

    public function uploadImage($imagePath)
    {
        $timestamp = time();

        // Création de la chaîne de signature manuellement
        $string_to_sign = "folder=test_folder&timestamp=" . $timestamp;
        $signature = hash_hmac("sha256", $string_to_sign, getenv('api_secret'));

        // Tentative d'upload avec les paramètres corrects
        try {
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder'    => 'test_folder',
                'timestamp' => $timestamp,
                'signature' => $signature,
                'api_key'   => getenv('api_key')
            ]);

            return $result;
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
