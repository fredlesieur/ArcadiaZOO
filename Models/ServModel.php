<?php

namespace App\Models;

class ServModel extends Model
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
    public function updateService($id, $data)
    {
        // Requête SQL pour mettre à jour le rapport vétérinaire
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

    /**
     * Get the value of image2
     */ 
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set the value of image2
     *
     * @return  self
     */ 
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }
}
