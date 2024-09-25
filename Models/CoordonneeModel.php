<?php

namespace App\Models;

class CoordonneeModel extends Model
{
    protected $id;
    protected $adresse;
    protected $cp_ville;
    protected $telephone;

    public function __construct() {
        $this->table = "coordonnee";
    }
}