<?php
namespace App\Models;

use App\Config\Db;
use Cloudinary\Cloudinary as CloudinaryService; 
use Exception;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de Cloudinary
    protected $cloudinary;

    public function __construct()
    {
        parent::__construct(); // Appel au constructeur de la classe Db pour s'assurer que l'instance PDO est correctement initialisée.

        // Configurer Cloudinary ici
        $this->cloudinary = new CloudinaryService([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
                'api_key' => $_ENV['CLOUDINARY_API_KEY'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
            ]
        ]);
    }

    public function findAll()
    {
        $query = $this->req("SELECT * FROM {$this->table}");
        return $query->fetchAll();
    }

    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }

        $liste_champs = implode(' AND ', $champs);
        return $this->req('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
    }

    public function find(int $id)
    {
        return $this->req("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch();
    }

    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        foreach ($this as $champ => $valeur) {
            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        return $this->req('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES(' . $liste_inter . ')', $valeurs);
    }

    public function update(int $id)
    {
        $champs = [];
        $valeurs = [];

        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;
        $listChamps = implode(', ', $champs);
        return $this->req('UPDATE ' . $this->table . ' SET ' . $listChamps . ' WHERE id = ?', $valeurs);
    }

    public function delete(int $id)
    {
        return $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function req(string $sql, array $attributs = null)
    {
        // Utilisation de l'instance de Db
        $db = Db::getInstance(); 

        try {
            if ($attributs !== null) {
                $query = $db->prepare($sql);
                $query->execute($attributs);
                return $query;
            } else {
                return $db->query($sql);
            }
        } catch (Exception $e) {
            file_put_contents('error_log.txt', date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . "\n", FILE_APPEND);
            return false; 
        }
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $setter = 'set' . ucfirst($key);

            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        return $this;
    }

    public function uploadImage(array $file)
    {
        if (!isset($file['tmp_name']) || $file['error'] != 0) {
            echo "Erreur : Fichier non téléchargé ou problème lors du transfert.<br>";
            var_dump($file);
            return false;
        }

        try {
            // Uploader l'image sur Cloudinary
            $response = $this->cloudinary->uploadApi()->upload($file['tmp_name'], [
                'folder' => 'images',
            ]);

            return $response['secure_url']; 
        } catch (Exception $e) {
            echo "Erreur lors de l'upload sur Cloudinary : " . $e->getMessage();
            return false;
        }
    }
}
