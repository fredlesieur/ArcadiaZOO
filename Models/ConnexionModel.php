<?php

namespace App\Models;


class ConnexionModel extends Model
{
    protected $id;
    protected $email;
    protected $password;
    protected $role;

    protected $nom_prenom;

    public function __construct() {
        $this->table = "users"; // Table des utilisateurs
    }

    // Méthode pour créer un compte administrateur
public function createAdmin($nom_prenom, $email, $password, $role_id)
{
    // Hasher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Préparer la requête d'insertion avec role_id
    $sql = "INSERT INTO " . $this->table . " (nom_prenom, email, password, role_id) VALUES (:nom_prenom, :email, :password, :role_id)";
    $query = $this->req($sql, [
        'nom_prenom' => $nom_prenom,
        'email' => $email,
        'password' => $hashedPassword,
        'role_id' => $role_id 
    ]);

    return $query;
}


public function findUserByEmail($email)
{
    // On utilise la méthode req pour faire une jointure avec la table roles
    $sql = "SELECT users.*, roles.role_name AS role 
            FROM users 
            JOIN roles ON users.role_id = roles.id 
            WHERE users.email = ?";
    
    return $this->req($sql, [$email])->fetch();
}
public function emailExists($email)
{
    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt = $this->req($sql, ['email' => $email]);
    return $stmt->fetchColumn() > 0;
}

public function createUser($nom_prenom, $email, $password, $role_id)
{
    $sql = "INSERT INTO users (nom_prenom, email, password, role_id) VALUES (:nom_prenom, :email, :password, :role_id)";
    return $this->req($sql, [
        'nom_prenom' => $nom_prenom,
        'email' => $email,
        'password' => $password,
        'role_id' => $role_id
    ]);
}

public function getAllUsers()
{
    $sql = "SELECT id, nom_prenom, email, role_id FROM " . $this->table;
    return $this->req($sql)->fetchAll();
}

public function updateUser($id, $data)
{
    $sql = "UPDATE users SET nom_prenom = :nom_prenom, email = :email, role_id = :role_id WHERE id = :id";
    return $this->req($sql, [
        'nom_prenom' => $data['nom_prenom'],
        'email' => $data['email'],
        'role_id' => $data['role_id'],
        'id' => $id
    ]);
}

}