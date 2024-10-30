<?php

namespace App\Models;

use Cloudinary\Cloudinary;
use Exception;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        // Utilisation de `cloudinary_url` en minuscule
        $this->cloudinary = new Cloudinary($_ENV['cloudinary_url']);
    }

    public function uploadImage($imagePath)
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder' => 'test_folder'
            ]);
            return $result;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
