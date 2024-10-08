<?php

namespace App\Models;

class VeterinaireModel extends Model
{
    protected $user_id;
    protected $animal_id;
    protected $etat;
    protected $nourriture;
    protected $grammage;
    protected $date_passage;
    protected $detail_etat;
    
    public function __construct()
    {
        $this->table = 'rapports_veterinaires';
    }

    public function ajouterRapport($data)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (user_id, animal_id, etat, nourriture, grammage, date_passage, detail_etat) 
            VALUES (:user_id, :animal_id, :etat, :nourriture, :grammage, :date_passage, :detail_etat)",
            
            [
                'user_id' => $data['user_id'],
                'animal_id' => $data['animal_id'],
                'etat' => $data['etat'],
                'nourriture' => $data['nourriture'],
                'grammage' => $data['grammage'],
                'date_passage' => $data['date_passage'],
                'detail_etat' => $data['detail_etat']
            ]
        );
    } 

    public function selectRapportsWithAnimals()
    {
        return $this->req(
            "SELECT r.*, a.nom AS animal_nom, u.nom_prenom AS user_nom_prenom 
            FROM " . $this->table . " r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id"
        );
    }
    public function selectRapportsWithAnimalsById($id)
    {
        return $this->req(
            "SELECT r.*, a.id AS id_animal, a.nom AS animal_nom, u.nom_prenom AS user_nom_prenom 
            FROM " . $this->table . " r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id
            WHERE r.id = :id",
            ['id' => $id]
        )->fetch();
    }
    public function getAllRapports() {
        $sql = "SELECT * FROM rapports_veterinaires";
        return $this->req($sql)->fetchAll();
    }  
    
    public function updateRapport($id, $data)
    {
        // Requête SQL pour mettre à jour le rapport vétérinaire
        $sql = "UPDATE " . $this->table . " 
                SET animal_id = :animal_id,
                    etat = :etat, 
                    nourriture = :nourriture, 
                    grammage = :grammage, 
                    date_passage = :date_passage, 
                    detail_etat = :detail_etat 
                WHERE id = :id";

        // Exécuter la requête en utilisant la méthode req du modèle
        return $this->req($sql, [
            'animal_id' => $data['animal_id'],
            'etat' => $data['etat'],
            'nourriture' => $data['nourriture'],
            'grammage' => $data['grammage'],
            'date_passage' => $data['date_passage'],
            'detail_etat' => $data['detail_etat'],
            'id' => $id
        ]);
    }
}
