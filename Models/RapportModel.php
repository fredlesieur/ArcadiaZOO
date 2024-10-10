<?php

namespace App\Models;

class RapportModel extends Model
{
    protected $id;
    protected $user_id;
    protected $animal_id;
    protected $etat;
    protected $nourriture;
    protected $grammage;
    protected $date_passage;
    protected $detail_etat;
    protected $date_heure;
    protected $grammage_preconise;

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
     * Get the value of nourriture
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * Set the value of nourriture
     *
     * @return  self
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    /**
     * Get the value of grammage
     */
    public function getGrammage()
    {
        return $this->grammage;
    }

    /**
     * Set the value of grammage
     *
     * @return  self
     */
    public function setGrammage($grammage)
    {
        $this->grammage = $grammage;

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
     * Get the value of grammage_preconise
     */ 
    public function getGrammage_preconise()
    {
        return $this->grammage_preconise;
    }

    /**
     * Set the value of grammage_preconise
     *
     * @return  self
     */ 
    public function setGrammage_preconise($grammage_preconise)
    {
        $this->grammage_preconise = $grammage_preconise;

        return $this;
    }
}
