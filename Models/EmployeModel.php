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
    public function getRapports()
{
    $sql = "SELECT r.id, r.nourriture, r.quantite, r.date, r.observations, 
                   a.nom AS nom_animal, 
                   u.nom_prenom AS nom_employe
            FROM nourrir_employe r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id";  // Jointure avec la table users pour récupérer le nom de l'employé
    
    return $this->req($sql)->fetchAll();
}
public function updateService($id, $data)
{
    // Requête SQL pour mettre à jour le service
    $sql = "UPDATE " . $this->table . " 
            SET name = :name,
                description = :description, 
                image = :image, 
                image2 = :image2, 
                categorie = :categorie, 
                duree = :duree,
                tarifs = :tarifs,
                horaires = :horaires
            WHERE id = :id";

    // Exécuter la requête en utilisant la méthode req du modèle
    return $this->req($sql, [
        'name' => $data['name'],
        'description' => $data['description'],
        'image' => $data['image'],
        'image2' => $data['image2'],
        'categorie' => $data['categorie'],
        'duree' => $data['duree'],
        'tarifs' => $data['tarifs'],
        'horaires' => $data['horaires'],
        'id' => $id
    ]);
}

public function updateRapport($id, $data)
{
    // Requête SQL pour mettre à jour le rapport employé
    $sql = "UPDATE " . $this->table . " 
            SET nourriture = :nourriture,
                quantite = :quantite, 
                date = :date, 
                observations = :observations
            WHERE id = :id";

    // Exécuter la requête en utilisant la méthode req du modèle
    return $this->req($sql, [
        'nourriture' => $data['nourriture'],
        'quantite' => $data['quantite'],
        'date' => $data['date'],
        'observations' => $data['observations'],
        'id' => $id
    ]);
}
public function getRapportById($id)
{
    $sql = "SELECT r.id, r.nourriture, r.quantite, r.date, r.observations, 
                   a.nom AS nom_animal, 
                   u.nom_prenom AS nom_employe
            FROM nourrir_employe r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id
            WHERE r.id = :id";  // Ajouter la condition pour récupérer un seul rapport

    $stmt = $this->req($sql, ['id' => $id]);
    return $stmt->fetch(); // Retourner un seul rapport
}
public function deleteRapport($id)
{
    $sql = "DELETE FROM nourrir_employe WHERE id = :id";
    $this->req($sql, ['id' => $id]);
}

}
