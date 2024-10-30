<?php
$apiSecret = 'KlK2br2jEW5fPke9mz-3ZNhlVWg'; // Remplacez par votre clé secrète

// Paramètres de l'upload
$timestamp = time();
$stringToSign = "folder=test_folder&timestamp=" . $timestamp;

// Génération de la signature
$signature = hash_hmac('sha256', $stringToSign, $apiSecret);

// Affichage des résultats
echo "Timestamp: " . $timestamp . PHP_EOL;
echo "Signature: " . $signature . PHP_EOL;
