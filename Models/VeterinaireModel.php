<?php

namespace App\Models;

class VeterinaireModel extends Model {

        protected $table = 'rapports_veterinaires'; // Nom de la table
    
        public function __construct() {
            // Appel au constructeur parent si nécessaire
            parent::__construct(); 
            // Initialisation des propriétés si besoin
            $this->table = 'rapports_veterinaires'; 
        }

    // Méthode pour ajouter un rapport vétérinaire (en utilisant create)
    public function ajouterRapport($data) {
        // Hydrater les données avant de les insérer
        $this->hydrate($data);
        return $this->create(); // Appel à la méthode create de ton modèle parent
    }

    // Méthode pour récupérer tous les rapports
    public function getAllRapports() {
        return $this->findAll(); // Utilisation de findAll existant dans ton modèle
    }

    // Méthode pour récupérer les rapports d'un animal spécifique
    public function getRapportsByAnimal($animal_id) {
        return $this->findBy(['animal_id' => $animal_id]); // Utilisation de findBy existant
    }

    public function saveRapport() {
        // Récupérer les données du formulaire
        $data = [
            'animal_id' => $_POST['animal_id'],
            'etat' => $_POST['etat'],
            'nourriture' => $_POST['nourriture'],
            'grammage' => $_POST['grammage'],
            'date_passage' => $_POST['date_passage'],
            'detail_ett' => $_POST['detail_ett'] ?? null, // facultatif
        ];
    
        // Appeler la méthode du modèle pour ajouter un rapport
        $this->VeterinaireModel->ajouterRapport($data);
    
        // Redirection après ajout réussi
        header("Location: /veterinaire/rapports");
        exit;
    }
    
}
