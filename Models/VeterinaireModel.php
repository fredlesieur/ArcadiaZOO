<?php

namespace App\Models;

class VeterinaireModel extends Model {
    protected $table = 'rapports_veterinaires'; // Nom de la table contenant les rapports vétérinaires

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
}
