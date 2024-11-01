<?php

namespace App\Models;

class AccueilModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $image;

    public function __construct() {
        $this->table = "accueil";
    }

    public function createAccueil($name, $description, $image)
     {
        return $this->req(
            "INSERT INTO " . $this->table . " (name, description, image)
             VALUES (:name, :description, :image)",
            [
                'name' => $name,
                'description' => $description,
                'image' => $image
            ]
    );
    }

    public function updateAccueil($id, $name, $description, $image)
    {
        return $this->req(
            "UPDATE " . $this->table . " SET name = :name, description = :description, image = :image WHERE id = :id",
            [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'image' => $image
            ]
        );
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}