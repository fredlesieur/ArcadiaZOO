<?php

namespace App\Models;

class ServModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $image;
    protected $categorie;
    protected $duree;
    protected $tarifs;
    protected $horaires;

    public function __construct() {
        $this->table = "services";
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
    public function getDuree()
    {
        return $this->duree;
    }
    public function getTarifs()
    {
        return $this->tarifs;
    }
    public function getHoraires()
    {
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
        $this->categorie= $categorie;
    }
       public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }
    public function setTarifs($tarifs)
    {
        $this->tarifs = $tarifs;

        return $this;
    }
    public function setHoraires($horaires)
    {
        $this->horaires = $horaires;

        return $this;
    }
}
