<?php

namespace App\Models;
use App\Config\Db;

class AvisModel extends Model
{
    protected $id;
    protected $pseudo;
    protected $comment;


    public function __construct() 
    {
        $this->table='addavis';
    }
    public function recupereAvis()
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

    }
    public function getAvis()
    {
        $db=Db::getInstance();
        $query = $db->query ('SELECT pseudo, comment FROM avis WHERE valid = 1');
        return $query->fetchAll();
    }
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

}

