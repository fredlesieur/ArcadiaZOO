<?php

namespace App\Models;
use App\Models\AnimalModel;

class VeterinaireModel extends Model {
   protected $animal_id;
    protected $etat;
    protected $nourriture;
    protected $grammage;
    protected $date_passage;
    protected $table = 'rapports_veterinaires'; // Nom de la table contenant les rapports vétérinaires
    protected $id;
    protected $user_id;
    protected $detail_etat;
    // Méthode pour ajouter un rapport vétérinaire (en utilisant create)
    public function ajouterRapport(array $data): bool
{
    // Hydrate l'objet avec les données
    $this->hydrate($data);

    // Préparer la requête pour ajouter le rapport
    $sql = "INSERT INTO rapports_veterinaires (animal_id, etat, nourriture, grammage, date_passage, detail_ett)
            VALUES (:animal_id, :etat, :nourriture, :grammage, :date_passage, :detail_ett)";

    // Exécuter la requête avec les attributs corrects
    return $this->req($sql, [
        'animal_id' => $this->animal_id,
        'etat' => $this->etat,
        'nourriture' => $this->nourriture,
        'grammage' => $this->grammage,
        'date_passage' => $this->date_passage, 
    ]);
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
