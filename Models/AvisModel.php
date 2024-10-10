<?php

namespace App\Models;
use App\Config\Db;

class AvisModel extends Model
{
    protected $id;
    protected $pseudo;
    protected $comment;
    protected $valid = 0;


    public function __construct() 
    {
        $this->table='addavis';
    }
   /*  public function recupereAvis()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->req($sql)->fetchAll();
        return $result;
    }

    public function saveAvis($pseudo, $comment){
        return $this->req(
            "INSERT INTO {$this->table} (pseudo, comment) VALUES (:pseudo, :comment)",
            [
                'pseudo' => $pseudo, 
                'comment' => $comment
            ]
        );

    } */
   /*  public function getAvis()
    {
        $db=Db::getInstance();
        $query = $db->query ('SELECT pseudo, comment FROM avis WHERE valid = 1');
        return $query->fetchAll();
    } */
    public function getAvisValides()
{
    return $this->req("SELECT pseudo, comment FROM {$this->table} WHERE valid = 1")->fetchAll();
}

public function validerAvis($id)
{
    return $this->req("UPDATE {$this->table} SET valid = 1 WHERE id = ?", [$id]);
}

public function invaliderAvis($id)
{
    return $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
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
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of valid
     */ 
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set the value of valid
     *
     * @return  self
     */ 
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }
}

