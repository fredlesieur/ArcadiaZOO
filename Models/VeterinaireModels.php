<?php

namespace App\Models;
use App\Models\AnimalModel;
use App\Config\Db;
class VeterinaireModel extends Model {
   protected $animal_id;
    protected $etat;
    protected $nourriture;
    protected $grammage;
    protected $date_passage;

    protected $id;
    protected $user_id;
    protected $detail_etat;
    // Méthode pour ajouter un rapport vétérinaire (en utilisant create)
    public function __construct() 
    {
        $this->table='rapports_veterinaires';
    }
    public function ajouterRapport()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->req($sql)->fetchAll();
        return $result;
    }

    public function saveRapport($animal_id,$etat,$nourriture,$grammage,$date_passage,$id,$user_id,$detail_etat){
        return $this->req(
            "INSERT INTO {$this->table} (animal_id,etat,nourriture,grammage,date_passage,id,user_id,detail_etat, comment) VALUES (:animal_id,:etat,:nourriture,:grammage,:date_passage,:id,:user_id,:detail_etat)",
            [
                'animal_id' =>$animal_id, 
                'etat' => $etat,
                'nourriture'=> $nourriture,
                'grammage' => $grammage,
                'date_passage' => $date_passage,
                'id'=> $id,
                'user_id' => $user_id,
                'detail_etat' => $detail_etat
            ]
        );

    }
}