<?php

namespace App\Models;

class HabitatsModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $description_courte;
    protected $image;
    protected $image2;
    protected $image3;
    protected $commentaire;
    protected $user_id;

    public function __construct() {
        $this->table = "habitats";
    }
    


    public function getRapportsHabitats()
    {
        $sql = "SELECT h.*, u.nom_prenom AS veterinaire_nom 
                FROM habitats h
                JOIN users u ON h.user_id = u.id";  // Associer l'ID du vétérinaire

        return $this->req($sql)->fetchAll();
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of description_courte
     */ 
    public function getDescription_courte()
    {
        return $this->description_courte;
    }

    /**
     * Set the value of description_courte
     *
     * @return  self
     */ 
    public function setDescription_courte($description_courte)
    {
        $this->description_courte = $description_courte;

        return $this;
    }
}