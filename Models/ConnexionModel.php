<?php
namespace App\Models;

use App\Config\Db;

class ConnexionModel extends Model
{
    
 
    protected $id;
    protected $email;
    protected $mdp;
    protected $role;

    public function __construct() {
        $this->table = "users";
    }
    public function getUserByEmail(string $email)
    {
        return $this->findBy(['username' => $email]);
    }
    
 
}
