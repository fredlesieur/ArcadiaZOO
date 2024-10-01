<?php

namespace App\Models;

use App\Config\Db;

class VeterinaireModel extends Model
{
    protected $animal_id;
    protected $etat;
    protected $nourriture;
    protected $grammage;
    protected $date_passage;
    protected $user_id;
    protected $detail_etat;

    public function __construct()
    {
        $this->table = 'rapports_veterinaires';
    }

    public function ajouterRapport(array $data): bool
    {
        $this->hydrate($data);
        $sql = "INSERT INTO rapports_veterinaires (animal_id, etat, nourriture, grammage, date_passage, detail_etat) 
                VALUES (:animal_id, :etat, :nourriture, :grammage, :date_passage, :detail_etat)";

        try {
            return $this->req($sql);
        } catch (\PDOException $e) {
            echo "Erreur lors de l'ajout du rapport : " . $e->getMessage();
            return false;
        }
    }
}
