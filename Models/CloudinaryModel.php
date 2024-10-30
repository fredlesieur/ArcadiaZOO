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
        // Utilisation correcte de & dans la chaîne de signature
        $stringToSign = 'folder=test_folder&timestamp=' . $timestamp;
        $signature = hash_hmac('sha256', $stringToSign, $_ENV['api_secret']);

        $result = $this->cloudinary->uploadApi()->upload($imagePath, [
            'folder'     => 'test_folder',
            'timestamp'  => $timestamp,
            'signature'  => $signature,
            'api_key'    => $_ENV['api_key']
        ]);

        return $result;
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}
}
