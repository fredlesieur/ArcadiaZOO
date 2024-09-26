<?php

namespace App\Models;


class ConnexionModel extends Model
{
    protected $id;
    protected $email;
    protected $password;
    protected $role;

    public function __construct() {
        $this->table = "users"; // Table des utilisateurs
    }

    // Méthode pour créer un compte administrateur
    public function createAdmin($email, $password, $role_id)
{
    // Hasher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Préparer la requête d'insertion avec role_id
    $sql = "INSERT INTO " . $this->table . " (email, password, role_id) VALUES (:email, :password, :role_id)";
    $query = $this->req($sql, [
        'email' => $email,
        'password' => $hashedPassword,
        'role_id' => $role_id // L'ID du rôle (1 pour administrateur par exemple)
    ]);

    return $query;
}

}
