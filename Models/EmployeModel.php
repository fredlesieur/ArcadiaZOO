<?php 

namespace App\Models;
use App\Models\Model;
    
class EmployeModel extends Model
{
    protected $id;
    protected $user_id;
    protected $animal_id;
    protected $nourriture;
    protected $quantite;
    protected $date;
    protected $observations; 

    protected $table = 'nourrir_employe';

    public function __construct() {
        $this->table = "nourrir_employe";
    }
    public function enregistrerRapportEmploye($user_id, $animal_id, $nourriture, $quantite, $date, $observations)
    {
        $sql = "INSERT INTO {$this->table} (user_id, animal_id, nourriture, quantite, date, observations) 
                VALUES (:user_id, :animal_id, :nourriture, :quantite, :date, :observations)";

        // Exécuter la requête avec les valeurs passées
        $this->req($sql, [
            'user_id' => $user_id,
            'animal_id' => $animal_id,
            'nourriture' => $nourriture,
            'quantite' => $quantite,
            'date' => $date,
            'observations' => $observations
        ]);
    }
}
