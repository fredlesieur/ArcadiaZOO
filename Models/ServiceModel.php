<?php

namespace App\Models;

class ServiceModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $image;
    protected $image2;
    protected $categorie;
    protected $duree;
    protected $tarifs;
    protected $horaires;

    public function __construct() {
        $this->table = "services";
    }
    
    public function getUniqueCategories()
    {
        $sql = "SELECT DISTINCT categorie FROM " . $this->table . " WHERE categorie IS NOT NULL";
        $result = $this->req($sql)->fetchAll();
        
        // Extraire uniquement les valeurs de catégorie
        $categories = array_column($result, 'categorie');
        
        return $categories;
    }
    

    public function getAllCategories()
    {
        $sql = "SELECT DISTINCT categorie FROM " . $this->table;
        $result = $this->req($sql)->fetchAll();
        return array_column($result, 'categorie');
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function getTarifs() {
        return $this->tarifs;
    }

    public function getHoraires() {
        return $this->horaires;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
        return $this;
    }

    public function setTarifs($tarifs) {
        $this->tarifs = $tarifs;
        return $this;
    }

    public function setHoraires($horaires) {
        $this->horaires = $horaires;
        return $this;
    }

    public function getImage2()
    {
        return $this->image2;
    }

    public function setImage2($image2)
    {
        $this->image2 = $image2;
        return $this;
    }
}
