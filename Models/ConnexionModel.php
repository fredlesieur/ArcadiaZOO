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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of nom_prenom
     */ 
    public function getNom_prenom()
    {
        return $this->nom_prenom;
    }

    /**
     * Set the value of nom_prenom
     *
     * @return  self
     */ 
    public function setNom_prenom($nom_prenom)
    {
        $this->nom_prenom = $nom_prenom;

        return $this;
    }
}