<?php

namespace App\Models;

class NourrirModel extends Model
{
    protected $id;
    protected $user_id;
    protected $animal_id;
    protected $nourriture;
    protected $quantite;
    protected $date;
    protected $observations;

    public function __construct()
    {
        $this->table = 'nourrir_employe';
    }

    public function createReport(array $data)
    {
        $this->hydrate($data);
        return $this->create();
    }

    public function updateReport(int $id, array $data)
    {
        $this->hydrate($data);
        return $this->update($id);
    }

    public function deleteReport(int $id)
    {
        return $this->delete($id);
    }
}
