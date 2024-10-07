<?php

namespace App\Models;

class HabitatsModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $description_accueil;
    protected $image;
    protected $image2;
    protected $image3;
    protected $commentaire;

    public function __construct() {
        $this->table = "habitats";
    }
    
    public function createReport(array $data)
    {
        $sql = "UPDATE habitats SET commentaire = :rapport, user_id = :user_id WHERE id = :habitat_id";
        $stmt = $this->req($sql, [
            ':rapport' => $data['commentaire'],
            ':user_id' => $data['user_id'],  // Ajouter l'ID du vétérinaire
            ':habitat_id' => $data['habitat_id']
        ]);
        return $stmt;
    }

    public function getRapportsHabitats()
    {
        $sql = "SELECT h.*, u.nom_prenom AS veterinaire_nom 
                FROM habitats h
                JOIN users u ON h.user_id = u.id";  // Associer l'ID du vétérinaire

        return $this->req($sql)->fetchAll();
    }

    //mettre a jours un rapportHabitat

    public function updateReport(int $id, array $data)
    {
        $sql = "UPDATE habitats SET commentaire = :rapport WHERE id = :id";
        $stmt = $this->req($sql, [
            ':rapport' => $data['commentaire'],
            ':id' => $id
        ]);
        return $stmt->rowCount(); // Par exemple, retourner le nombre de lignes affectées
    }

    //supprimer un rapportHabitat
    public function deleteReport(int $id)
    {
        $sql = "DELETE FROM habitats WHERE id = :id";
        $stmt = $this->req($sql, [':id' => $id]);
        return $stmt->rowCount(); // Par exemple, retourner le nombre de lignes affectées
    }

    public function getRapportsWithVeterinaire()
    {
        $sql = "SELECT h.*, u.nom_prenom AS veterinaire_nom 
                FROM habitats h
                JOIN users u ON h.user_id = u.id";  // Associer l'ID du vétérinaire
        return $this->req($sql)->fetchAll();
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDescription_accueil() {
        return $this->description_accueil;
    }

    public function getImage() {
        return $this->image;
    }

    public function getImage2() {
        return $this->image2;
    }

    public function getImage3() {
        return $this->image3;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    // Setters
    public function setIdHabitats($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDescription_accueil($description_accueil) {
        $this->description = $description_accueil;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setImage2($image2) {
        $this->image2 = $image2;
    }

    public function setImage3($image3) {
        $this->image2 = $image3;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
}