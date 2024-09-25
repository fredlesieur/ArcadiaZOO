<?php

namespace App\Models;

class AccueilModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $image;

    public function __construct() {
        $this->table = "accueil";
    }
}