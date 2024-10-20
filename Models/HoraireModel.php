<?php

namespace App\Models;
use MongoDB\Client;
class HoraireModel extends Model
{
    public $id;
    public $saison;
    public $semaine;
    public $week_end;
    
    private $collection;

    public function __construct() {
        $mongoClient = new Client(getenv('MONGO_URI')); 
        $db = $mongoClient->arcadia; 
        $this->collection = $db->horaires; 
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
     * Get the value of saison
     */ 
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Set the value of saison
     *
     * @return  self
     */ 
    public function setSaison($saison)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get the value of semaine
     */ 
    public function getSemaine()
    {
        return $this->semaine;
    }

    /**
     * Set the value of semaine
     *
     * @return  self
     */ 
    public function setSemaine($semaine)
    {
        $this->semaine = $semaine;

        return $this;
    }

    /**
     * Get the value of week_end
     */ 
    public function getWeek_end()
    {
        return $this->week_end;
    }

    /**
     * Set the value of week_end
     *
     * @return  self
     */ 
    public function setWeek_end($week_end)
    {
        $this->week_end = $week_end;

        return $this;
    }

    /**
     * Get the value of collection
     */ 
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set the value of collection
     *
     * @return  self
     */ 
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }
}