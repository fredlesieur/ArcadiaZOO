<?php

namespace App\Models;

class ContactModel extends Model
{
    protected $id;
    protected $saison;
    protected $semaine;
    protected $week_end;

    public function __construct() {
        $this->table = "horaire_zoo";
    }
}