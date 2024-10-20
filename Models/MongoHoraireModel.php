<?php

namespace App\Models;

use MongoDB\Client;
use MongoDB\Client as MongoClient;


class MongoHoraireModel
{
    private $collection;

    public function __construct() {
        // Connexion à MongoDB avec les variables d'environnement
        $mongoClient = new Client(getenv('MONGO_URI')); 
        $db = $mongoClient->arcadia; 
        $this->collection = $db->horaires;  
    }

    public function getHoraires() {
        return $this->collection->find()->toArray();
    }

    public function addHoraire($data) {
        return $this->collection->insertOne($data);
    }

    public function updateHoraire($id, $data) {
        return $this->collection->updateOne(['_id' => new \MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
    }

    public function deleteHoraire($id) {
        return $this->collection->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }

    public function getHoraireById($id) {
        return $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }
}
