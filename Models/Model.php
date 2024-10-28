<?php
namespace App\Models;

use App\Config\Db;
use Exception;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de DB
    private $db;
    protected $cloudinary;

    public function __construct($db)
    {
        $this->db = $db;
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['cloud_name'] ?? getenv('cloud_name'),
                'api_key'    => $_ENV['api_key'] ?? getenv('api_key'),
                'api_secret' => $_ENV['api_secret'] ?? getenv('api_secret'),
            ],
            'url' => [
                'secure' => true
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
        return $this->req("SELECT * FROM {$this->table} WHERE id = $id ")->fetch();
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
        $this->db = Db::getInstance();

        try {
            if ($attributs !== null) {
                $query = $this->db->prepare($sql);
                $query->execute($attributs);
                return $query;
            } else {
                return $this->db->query($sql);
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

    // Fonction uploadImage (commentée dans votre code original)
    /* public function uploadImage(array $file, string $directory = 'assets/images/')
    {
        if (!isset($file['tmp_name']) || $file['error'] != 0) {
            echo "Erreur : Fichier non téléchargé ou problème lors du transfert.<br>";
            var_dump($file);
            return false;
        }

        $fileName = uniqid() . '_' . basename($file['name']);
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';
        $targetFilePath = $targetDir . $fileName;

        if (!is_dir($targetDir)) {
            echo "Création du répertoire cible : " . $targetDir . "<br>";
            if (!mkdir($targetDir, 0755, true)) {
                echo "Erreur lors de la création du répertoire.<br>";
                return false;
            }
        } else {
            echo "Le répertoire existe déjà : " . $targetDir . "<br>";
        }

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "Fichier déplacé avec succès vers : " . $targetFilePath . "<br>";
            return $fileName;
        } else {
            echo "Erreur lors du déplacement du fichier.<br>";
            var_dump($file);
            return false;
        }
    } */

    public function uploadImageToCloudinary(array $file)
    {
        if (!isset($file['tmp_name']) || $file['error'] != 0) {
            echo "Erreur : Fichier non téléchargé ou problème lors du transfert.<br>";
            return false;
        }
    
        try {
            $uploadResult = $this->cloudinary->uploadApi()->upload($file['tmp_name'], [
                'folder' => 'arcadia-zoo',
            ]);
            error_log("URL retournée par Cloudinary : " . $uploadResult['secure_url']);
            return $uploadResult['secure_url'];
        } catch (Exception $e) {
            error_log("Erreur lors de l'upload vers Cloudinary : " . $e->getMessage());
            echo "Erreur lors de l'upload vers Cloudinary : " . $e->getMessage() . "<br>";
            return false;
        }
    }
}
