<?php 

namespace App\Models;
use App\Models\Model;


class EmployeModel extends Model
{
    protected $table = 'nourrir_employe';

    // Méthode pour enregistrer un nourrissage
    public function enregistrerNourrissage($user_id, $animal_id, $etat, $nourriture, $grammage, $date_passage)
    {
        $sql = "INSERT INTO {$this->table} (user_id, animal_id, nourriture, quantite, date, observations) 
                VALUES (:user_id, :animal_id, :nourriture, :quantite, :date_passage, :etat)";

        // Exécuter la requête avec les valeurs passées
        $this->req($sql, [
            'user_id' => $user_id,
            'animal_id' => $animal_id,
            'nourriture' => $nourriture,
            'quantite' => $grammage,
            'date_passage' => $date_passage,
            'etat' => $etat
        ]);
    }

    // Récupérer la liste des animaux
    public function getAnimaux()
    {
        $sql = "SELECT * FROM animaux";
        return $this->req($sql)->fetchAll();
    }
}
