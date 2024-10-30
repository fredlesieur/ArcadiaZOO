<?php
namespace App\Models;

use Cloudinary\Cloudinary;

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
            $result = $this->cloudinary->uploadApi()->upload($imagePath, [
                'folder' => 'test_folder'
            ]);

            return $result;
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function testEnv()
{
    echo 'Cloud Name: ' . getenv('cloud_name') . '<br>';
    echo 'API Key: ' . getenv('api_key') . '<br>';
    echo 'API Secret: ' . getenv('api_secret') . '<br>';
}
}

