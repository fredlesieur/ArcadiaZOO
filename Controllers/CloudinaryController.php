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
        // Chemin vers une image de test dans le dossier assets/images
        $imageUrl = 'https://images.unsplash.com/photo-1618328130170-63d9f569d18b';  // Exemple d'URL d'image publique

        // Appel de la fonction d'upload
        $uploadResult = $this->uploadToCloudinary($imageUrl);

        // Appel de la méthode render en passant les données directement
        $this->render("testCloudinary", ["uploadResult" => $uploadResult]);
    }

    public function testEnv()
    {
        echo 'Cloud Name: ' . getenv('cloud_name') . '<br>';
        echo 'API Key: ' . getenv('api_key') . '<br>';
        echo 'API Secret: ' . getenv('api_secret') . '<br>';
    }

    public function uploadToCloudinary($imageUrl)
    {
        $cloud_name = 'dkpfhgnyx';  // Ton cloud name
        $api_key = '827717433564253';  // Ta clé API
        $api_secret = 'KlK2br2jEW5fPke9mz-3ZNhlVWg';  // Ton secret API
        $timestamp = time();

        // Génération de la signature
        $signatureString = "folder=test_folder&timestamp=" . $timestamp;
        $signature = hash_hmac("sha256", $signatureString, $api_secret);

        // Prépare les données pour la requête POST
        $data = [
            'file' => $imageUrl,  // Utilise l'URL d'image valide ici
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
