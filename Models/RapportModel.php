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
    protected $grammage_preconise;
    protected $nourriture_donnee;
    protected $grammage_donne;
    protected $veterinaire_id;
    protected $employe_id;

    public function __construct()
    {
        $this->table = "rapports";
    }

    public function findRapport($id)
    {
        return $this->req(
            "SELECT r.*, a.nom AS animal_nom, u.nom_prenom AS user_nom_prenom 
            FROM " . $this->table . " r
            JOIN animaux a ON r.animal_id = a.id
            JOIN users u ON r.user_id = u.id
            WHERE r.id = :id",
            ['id' => $id]
        )->fetch();
    }

    public function findAllRapport()
{
    return $this->req(
        "SELECT r.*, 
                a.nom AS animal_nom, 
                u.nom_prenom AS user_nom_prenom, 
                e.nom_prenom AS employe_nom_prenom,
                v.nom_prenom AS veterinaire_nom_prenom 
         FROM " . $this->table . " r
         JOIN animaux a ON r.animal_id = a.id
         JOIN users u ON r.user_id = u.id
         LEFT JOIN users e ON r.employe_id = e.id
         LEFT JOIN users v ON r.veterinaire_id = v.id"
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

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getAnimal_id() {
        return $this->animal_id;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getNourriture_preconisee() {
        return $this->nourriture_preconisee;
    }

    public function getDate_passage() {
        return $this->date_passage;
    }

    public function getDetail_etat() {
        return $this->detail_etat;
    }

    public function getDate_heure() {
        return $this->date_heure;
    }

    public function getGrammage_preconise() {
        return $this->grammage_preconise;
    }

    public function getNourriture_donnee() {
        return $this->nourriture_donnee;
    }

    public function getGrammage_donne() {
        return $this->grammage_donne;
    }

    public function getVeterinaire_id() {
        return $this->veterinaire_id;
    }

    public function getEmploye_id() {
        return $this->employe_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setAnimal_id($animal_id) {
        $this->animal_id = $animal_id;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setNourriture_preconisee($nourriture_preconisee) {
        $this->nourriture_preconisee = $nourriture_preconisee;
    }

    public function setDate_passage($date_passage) {
        $this->date_passage = $date_passage;
    }

    public function setDetail_etat($detail_etat) {
        $this->detail_etat = $detail_etat;
    }

    public function setDate_heure($date_heure) {
        $this->date_heure = $date_heure;
    }

    public function setGrammage_preconise($grammage_preconise) {
        $this->grammage_preconise = $grammage_preconise;
    }

    public function setNourriture_donnee($nourriture_donnee) {
        $this->nourriture_donnee = $nourriture_donnee;
    }

    public function setGrammage_donne($grammage_donne) {
        $this->grammage_donne = $grammage_donne;
    }

    public function setVeterinaire_id($veterinaire_id) {
        $this->veterinaire_id = $veterinaire_id;
    }

    public function setEmploye_id($employe_id) {
        $this->employe_id = $employe_id;
    }
}
