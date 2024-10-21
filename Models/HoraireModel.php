<?php

namespace App\Models;

use App\Config\MongoDb;
class HoraireModel extends MongoDb
{
    private $collection;

    public function __construct() {
        parent::__construct(); 
        $this->collection = $this->getCollection('arcadia', 'horaires');
    }

    public function findAll()
    {
        $options = [
            'typeMap' => [
                'root' => 'array',  // Return documents as objects
                'document' => 'array'
            ]
        ];
        return $this->collection->find([], $options)->toArray();
    }

    public function find($id)
    {
        $filter = ['_id' => new ObjectId($id)];
        $options = [
            'typeMap' => [
                'root' => 'array',  // Return documents as objects
                'document' => 'array'
            ]
        ];
        return $this->collection->findOne($filter, $options);
    }

    public function add_horaire($saison, $semaine, $week_end)
    {
        $data = [
            'saison' => $saison,
            'semaine' => $semaine,
            'week_end' => $week_end
        ];
        $this->collection->insertOne($data);
    }

    public function edit_horaire($id, $saison, $semaine, $week_end)
    {
        $filter = ['_id' => new ObjectId($id)];
        $update = [
            '$set' => [
                'saison' => $saison,
                'semaine' => $semaine,
                'week_end' => $week_end
            ]
        ];
        $this->collection->updateOne($filter, $update);
    }
}