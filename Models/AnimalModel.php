<?php

namespace App\Models;

class AnimalModel extends Model
{
    protected $id;
    protected $nom;
    protected $age;
    protected $image;
    protected $id_habitats;

    public function __construct() {
        $this->table = "animaux";
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
    
}
