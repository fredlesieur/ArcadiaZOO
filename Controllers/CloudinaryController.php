<?php

namespace App\config;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    private $cloudinary;

    /*
      initialise la connexion à Cloudinary en utilisant les variables d'environnement. 
     */

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
                'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET']
            ]
        ]);
    }

    /**
     * Envoie un fichier vers Cloudinary.
     *
        * @param string $file Le chemin du fichier à envoyer.
     */
    public function uploadFile($file)
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload($file, [
                'folder' => 'habitats/'
            ]);
            return $result['secure_url'];
        } catch (\Exception $e) {
            error_log("Cloudinary upload error: " . $e->getMessage());
            return false;
        }
    }

    /* efface un fichier de Cloudinary.
     *
     * @param string $publicId L'identifiant public du fichier à supprimer.
     */
    public function deleteFile($publicId)
    {
        try {
            $this->cloudinary->uploadApi()->destroy($publicId);
            return true;
        } catch (\Exception $e) {
            error_log("Cloudinary delete error: " . $e->getMessage());
            return false;
        }
    }
}


