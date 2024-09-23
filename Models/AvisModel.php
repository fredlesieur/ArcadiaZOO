<?php

namespace App\Models;
use App\Config\Db;
use PDO;
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
}

