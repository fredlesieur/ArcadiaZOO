<?php
namespace App\Models;

use App\Config\Db;
use Exception;
use Cloudinary\Cloudinary;

class Model extends Db
{
    //Table de la base de données
    protected $table;

   //Instance de DB
    private $db;


    public function findAll()
    {
        $query = $this->req("SELECT * FROM {$this->table}");
        return $query->fetchAll();
        
    }

public function findBy(array $criteres)
{
    $champs =[];
    $valeurs = [];

    //on boucle pour eclater le tableau
    foreach($criteres as $champ => $valeur)
    {
        // SELECT * FROM annonces WHERE id = ? and signale
        //bindValue(1, valeur)
        $champs[] = "$champ = ?";
        $valeurs[] = $valeur;
        
    }
    // on transforme le tableau champ en une chaine de caractères
    $liste_champs = implode(' AND ', $champs);
    // on exécute la requete
    return $this ->req(' SELECT * FROM ' . $this->table. ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
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

    //on boucle pour éclater le tableau
    foreach($this as $champ => $valeur)
    {
        // INSERT INTO annonce (titre, description, prix, ...) VALUES (?, ?, ?)
        if($valeur != null && $champ != 'db' && $champ != 'table'){
            $champs[] = $champ;
            $inter[] = "?";
            $valeurs[] = $valeur;
        }
    }

    // on transforme le tableau champ en une chaîne de caractères
    $liste_champs = implode(', ', $champs);
    $liste_inter = implode(', ', $inter);

    // on exécute la requête
    return $this->req('INSERT INTO '.$this->table. ' ('. $liste_champs.') VALUES('.$liste_inter.')', $valeurs);
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
        // Journalisez l'erreur dans un fichier
        file_put_contents('error_log.txt', date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . "\n", FILE_APPEND);
        return false; // ou gérez l'erreur comme vous le souhaitez
    }
}


   public function hydrate(array $donnees)
   {
    foreach($donnees as $key =>$value){
        // on récupère le nom du setter correspondant à la clé (Key)
        //titre -> setTitre
        $setter = 'set'.ucfirst($key);
        
        //on vérifie si le setter existe
        if(method_exists($this, $setter)){
            // On appelle le setter
            $this->$setter($value);
        }
    }
    return $this;
   }
   public function uploadImage(array $file, string $directory = 'assets/images/')
   {
       // Vérifie si le fichier a bien été uploadé
       if (!isset($file['tmp_name']) || $file['error'] != 0) {
           echo "Erreur : Fichier non téléchargé ou problème lors du transfert.<br>";
           var_dump($file);  // Affiche les informations du fichier pour debug
           return false;
       }
   
       // Génère un nom unique pour l'image
       $fileName = uniqid() . '_' . basename($file['name']);
       
       // Ajuste le chemin pour ton dossier correct
       $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';

       $targetFilePath = $targetDir . $fileName;
   
       // Vérifie si le répertoire cible existe, sinon le crée
       if (!is_dir($targetDir)) {
           echo "Création du répertoire cible : " . $targetDir . "<br>";
           if (!mkdir($targetDir, 0755, true)) {
               echo "Erreur lors de la création du répertoire.<br>";
               return false;
           }
       } else {
           echo "Le répertoire existe déjà : " . $targetDir . "<br>";
       }
   
       // Déplace le fichier temporaire vers le répertoire final
       if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
           echo "Fichier déplacé avec succès vers : " . $targetFilePath . "<br>";
           return $fileName;  // Retourne le nom du fichier à enregistrer dans la base
       } else {
           echo "Erreur lors du déplacement du fichier.<br>";
           var_dump($file);
           return false;
       }
   }
   
   public function uploadImageToCloudinary(array $file)
   {
       
       // Code existant pour gérer l'upload
       if (!isset($file['tmp_name']) || $file['error'] != 0) {
           echo "Erreur : Fichier non téléchargé ou problème lors du transfert.<br>";
           return false;
       }
   
       // Initialise Cloudinary
       $cloudinary = new Cloudinary([
           'cloud' => [
               'cloud_name' => $_ENV('CLOUDINARY_CLOUD_NAME'),
               'api_key'    => $_ENV('CLOUDINARY_API_KEY'),
               'api_secret' => $_ENV('CLOUDINARY_API_SECRET'),
           ],
       ]);
   
       try {
           $uploadResult = $cloudinary->uploadApi()->upload($file['tmp_name'], [
               'folder' => 'arcadia-zoo',
           ]);
   
           return $uploadResult['secure_url'];
       } catch (Exception $e) {
           echo "Erreur lors de l'upload vers Cloudinary : " . $e->getMessage() . "<br>";
           return false;
       }
   }
   
}