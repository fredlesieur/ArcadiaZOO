<?php

namespace App\Controllers;

use App\Models\CloudinaryModel;

class CloudinaryController extends Controller
{
    private $cloudinaryModel;

    public function __construct()
    {
        // Initialisation du modèle Cloudinary
        $this->cloudinaryModel = new CloudinaryModel();
    }

    public function testUpload()
    {
        // URL d'une image de test
        $imageUrl = 'https://images.unsplash.com/photo-1618328130170-63d9f569d18b';

        // Appel à la méthode d'upload
        $uploadResult = $this->uploadToCloudinary($imageUrl);

        // Appel de la méthode render en passant les données directement à la vue 'testUpload'
        $this->render("testUpload", ["uploadResult" => $uploadResult]);
    }

    private function uploadToCloudinary($imageUrl)
    {
        $cloud_name = getenv('cloud_name');  
        $api_key = getenv('api_key'); 
        $api_secret = getenv('api_secret');
        $timestamp = time();

        // Création de la chaîne de signature
        $string_to_sign = "folder=test_folder&timestamp=" . $timestamp;
        $signature = hash_hmac("sha256", $string_to_sign, $api_secret);

        // Préparation des données pour la requête POST
        $data = [
            'file' => $imageUrl,
            'api_key' => $api_key,
            'timestamp' => $timestamp,
            'signature' => $signature,
            'folder' => 'test_folder'
        ];

        // Initialiser cURL pour envoyer la requête
        $url = "https://api.cloudinary.com/v1_1/$cloud_name/image/upload";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        curl_close($ch);
        return json_decode($response, true);
    }
}


