<?php

namespace App\Models;

use App\Config\Db;

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

    public function ajouterRapport($user_id, $animal_id, $etat, $nourriture, $grammage, $date_passage, $detail_etat)
    {
        $this->req("INSERT INTO " .$this->table. "(user_id, animal_id, etat, nourriture, grammage, date_passage, detail_etat) 
                VALUES (:user_id, :animal_id, :etat, :nourriture, :grammage, :date_passage, :detail_etat)",
                [
                    'user_id' => $user_id,
                    'animal_id' => $animal_id,
                    'etat' => $etat,
                    'nourriture' => $nourriture,
                    'grammage' => $grammage,
                    'date_passage' => $date_passage,
                    'detail_etat' => $detail_etat
                ]
        );
    } 
}