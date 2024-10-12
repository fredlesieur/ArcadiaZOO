<?php

namespace App\Models;

class RapportModel extends Model
{
    protected $id;
    protected $user_id;
    protected $animal_id;
    protected $etat;
    protected $nourriture_preconisee;
    protected $date_passage;
    protected $detail_etat;
    protected $date_heure;
    protected $grammage_preconisee;
    protected $nourriture_donnee;
    protected $grammage_donne;

    public function __construct()
    {
        $this->table = "rapports";
    }


    public function findRapport($id)
    {
        //fonction de selection de rapport par son id avec jointure
        return $this->req(
            "SELECT r.*, a.id AS id_animal, a.nom AS animal_nom, u.nom_prenom AS user_nom_prenom 
            FROM " . $this->table . " r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id
            WHERE r.id = :id",
            ['id' => $id]
        )->fetch();
    }

    public function findAllRapport()
    {
        //fonction de selection de tout les rapports avec jointure
        return $this->req(
            "SELECT r.*, a.id AS id_animal, a.nom AS animal_nom, u.nom_prenom AS user_nom_prenom 
            FROM " . $this->table . " r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id"
        )->fetchAll();
    }

    public function findLastRapportByAnimalId($animalId)
    {
        return $this->req(
            "SELECT * FROM " . $this->table . " 
            WHERE animal_id = :animal_id 
            ORDER BY date_passage DESC LIMIT 1",
            ['animal_id' => $animalId]
        )->fetch();
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
     * Get the value of animal_id
     */ 
    public function getAnimal_id()
    {
        return $this->animal_id;
    }

    /**
     * Set the value of animal_id
     *
     * @return  self
     */ 
    public function setAnimal_id($animal_id)
    {
        $this->animal_id = $animal_id;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of nourriture_preconisee
     */ 
    public function getNourriture_preconisee()
    {
        return $this->nourriture_preconisee;
    }

    /**
     * Set the value of nourriture_preconisee
     *
     * @return  self
     */ 
    public function setNourriture_preconisee($nourriture_preconisee)
    {
        $this->nourriture_preconisee = $nourriture_preconisee;

        return $this;
    }

    /**
     * Get the value of date_passage
     */ 
    public function getDate_passage()
    {
        return $this->date_passage;
    }

    /**
     * Set the value of date_passage
     *
     * @return  self
     */ 
    public function setDate_passage($date_passage)
    {
        $this->date_passage = $date_passage;

        return $this;
    }

    /**
     * Get the value of detail_etat
     */ 
    public function getDetail_etat()
    {
        return $this->detail_etat;
    }

    /**
     * Set the value of detail_etat
     *
     * @return  self
     */ 
    public function setDetail_etat($detail_etat)
    {
        $this->detail_etat = $detail_etat;

        return $this;
    }

    /**
     * Get the value of date_heure
     */ 
    public function getDate_heure()
    {
        return $this->date_heure;
    }

    /**
     * Set the value of date_heure
     *
     * @return  self
     */ 
    public function setDate_heure($date_heure)
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    /**
     * Get the value of grammage_preconisee
     */ 
    public function getGrammage_preconisee()
    {
        return $this->grammage_preconisee;
    }

    /**
     * Set the value of grammage_preconisee
     *
     * @return  self
     */ 
    public function setGrammage_preconisee($grammage_preconisee)
    {
        $this->grammage_preconisee = $grammage_preconisee;

        return $this;
    }

    /**
     * Get the value of nourriture_donnee
     */ 
    public function getNourriture_donnee()
    {
        return $this->nourriture_donnee;
    }

    /**
     * Set the value of nourriture_donnee
     *
     * @return  self
     */ 
    public function setNourriture_donnee($nourriture_donnee)
    {
        $this->nourriture_donnee = $nourriture_donnee;

        return $this;
    }

    /**
     * Get the value of grammage_donne
     */ 
    public function getGrammage_donne()
    {
        return $this->grammage_donne;
    }

    /**
     * Set the value of grammage_donne
     *
     * @return  self
     */ 
    public function setGrammage_donne($grammage_donne)
    {
        $this->grammage_donne = $grammage_donne;

        return $this;
    }
}