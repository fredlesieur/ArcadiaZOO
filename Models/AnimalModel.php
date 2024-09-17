<?php

namespace App\Models;

Class AnimalModel extends Model
{
    protected $id;
    protected $name;
    protected $age;
    public function __construct() {
        $this->table = "animals";
    }
  
}
