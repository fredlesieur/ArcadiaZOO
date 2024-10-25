<?php

namespace App\Models;

class AnimalModel extends Model
{
    protected $id;
    protected $nom;
    protected $race;
    protected $age;
    protected $image;
    protected $id_habitats;

    protected $table = 'animaux';

    public function __construct() {
        $this->table = "animaux";
    }

    //requete SQL pour récupérer les animaux par ordre alphabetique
    public function findAllOrderedByName() {
        $sql = "SELECT * FROM animaux ORDER BY nom ASC";
        return $this->req($sql)->fetchAll();
    }
    //requete SQL pour récupérer les rapports par animal et les informations de l'animal et l'utilisateur
    public function getRapportByAnimalId($id) {
        $sql = "SELECT rv.*, 
                       a.nom AS animal_nom, 
                       a.image AS animal_image, 
                       a.age AS animal_age, 
                       a.race AS animal_race, 
                       h.name AS animal_habitat, 
                       u.nom_prenom AS user_nom_prenom
                FROM animaux a
                LEFT JOIN rapports rv ON rv.animal_id = a.id
                LEFT JOIN habitats h ON a.id_habitats = h.id
                LEFT JOIN users u ON rv.user_id = u.id
                WHERE a.id = :id"; 
    
        $stmt = $this->req($sql, ['id' => $id]);
        $result = $stmt->fetch();
        
        return $result;
    }
    //requete SQL pour récupérer les animaux avec leur habitat
    public function findAllWithHabitats()
{
    $sql = "SELECT a.*, h.name AS habitat_name
            FROM animaux a
            LEFT JOIN habitats h ON a.id_habitats = h.id";
    return $this->req($sql)->fetchAll();
}

// requete SQL pour incrémenter le nombre de vues de l'animal correspondant


    public function incrementViews($id)
    {
        $this->req("UPDATE {$this->table} SET views = views + 1 WHERE id = ?", [$id]);
    }

    
    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAge() {
        return $this->age;
    }

    public function getImage() {
        return $this->image;
    }
    public function getRace()
    {
        return $this->race;
    }
    

    public function getId_habitats()
    {
        return $this->id_habitats;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    public function setId_habitats($id_habitats)
    {
        $this->id_habitats = $id_habitats;

        return $this;
    }
   
    
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }
}
