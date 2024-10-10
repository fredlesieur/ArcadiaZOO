<?php

namespace App\Models;

class CoordonneeModel extends Model
{
    protected $id;
    protected $adresse;
    protected $cp_ville;
    protected $telephone;

    public function __construct() {
        $this->table = "coordonnee";
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
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of cp_ville
     */ 
    public function getCp_ville()
    {
        return $this->cp_ville;
    }

    /**
     * Set the value of cp_ville
     *
     * @return  self
     */ 
    public function setCp_ville($cp_ville)
    {
        $this->cp_ville = $cp_ville;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
}