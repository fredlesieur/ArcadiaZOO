<?php
$motDePasse = "VotreNouveauMotDePasse"; // Remplacez par le mot de passe souhaité
$hash = password_hash($motDePasse, PASSWORD_DEFAULT);
echo "Le hachage généré est : " . $hash;
