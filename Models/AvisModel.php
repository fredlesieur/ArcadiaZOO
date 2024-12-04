<?php

namespace App\Models;

class AvisModel extends Model
{
    protected $id;
    protected $pseudo;
    protected $comment;
    protected $valid = 0;

    public function __construct() 
    {
        $this->table = 'addavis';
    }

    // récupere les avis validés
    public function getAllValidatedReviews()
    {
        return $this->req("SELECT pseudo, comment FROM {$this->table} WHERE valid = 1")->fetchAll();
    }

    // récupere les avis non validés
    public function getPendingReviews()
    {
        return $this->req("SELECT * FROM {$this->table} WHERE valid = 0")->fetchAll();
    }

    // valide un avis en le mettant à 1 dans la base de données
    public function approveReview($id)
    {
        return $this->req("UPDATE {$this->table} SET valid = 1 WHERE id = ?", [$id]);
    }

    // invalide un avis en le supprimant de la base de données
    public function rejectReview($id)
    {
        return $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function delete($id)
    {
        return $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    // Getters et setters pour les propriétés
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getValid()
    {
        return $this->valid;
    }

    public function setValid($valid)
    {
        $this->valid = $valid;
        return $this;
    }
}
