<?php

namespace App\Models;
use App\Config\MongoDb;

class ContactModel extends MongoDb
{
    private $collection;

    public function __construct()
    {
        parent::__construct();

        // Récupérer la collection 'horaires' de la base de données 'arcadia'
        $this->collection = $this->getCollection('arcadia', 'horaires');
    }

    public function findAll()
    {
        // Récupérer tous les horaires
        $horaires = [];
        foreach ($this->collection->find() as $horaire) {
            $horaires[] = (array) $horaire;
        }
        return $horaires;
    } 
}