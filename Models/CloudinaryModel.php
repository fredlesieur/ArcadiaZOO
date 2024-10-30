<?php
namespace App\Models;

use Cloudinary\Cloudinary;

class CloudinaryModel
{
    private $cloudinary;

    public function __construct()
    {
        // Initialisation du SDK Cloudinary avec les variables d'environnement
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
        try {
            // Upload d'image sans signature manuelle
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder' => 'test_folder'
            ]);

            return $result;
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
