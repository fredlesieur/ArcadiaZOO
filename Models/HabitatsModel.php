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

    // Getters
    public function getId() {
        return $this->id;
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
        $this->id=$id;
    }

    public function setName($name) {
       $this->name=$name;
    }

    public function setDescription($description) {
       $this->description=$description;
    }
    public function setDescription_accueil($description_accueil) {
        $this->description=$description_accueil;
     }
    public function setImage($image) {
       $this->image=$image;
    }
    public function setImage2($image2) {
       $this->image2=$image2;
    }
    public function setImage3($image3) {
        $this->image2=$image3;
     }
    public function setCommentaire($commentaire) {
       $this->commentaire=$commentaire;
    }

      
}