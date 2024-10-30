<?php

namespace App\Models;

use Cloudinary\Cloudinary;
use Exception;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        // Initialisation de Cloudinary avec `cloudinary_url`
        $this->cloudinary = new Cloudinary($_ENV['cloudinary_url']);
    }

    public function uploadImage($imagePath)
    {
        try {
            // Ajout du timestamp pour générer une signature valide
            $timestamp = time();

            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder' => 'test_folder',
                'timestamp' => $timestamp
            ]);
            return $result;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
