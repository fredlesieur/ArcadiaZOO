<?php

namespace App\Models;

class HoraireModel extends Model
{
    public $id;
    public $saison;
    public $semaine;
    public $week_end;

    public function __construct() {
        $this->table = "horaire_zoo";
    }
}