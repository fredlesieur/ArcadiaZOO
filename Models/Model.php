<?php
namespace App\Models;

use App\Config\Db;
use Exception;

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



/**
 * Exécute une requête SQL avec ou sans paramètres de manière sécurisée.
 *
 * @param string $sql La requête SQL à exécuter.
 * @param array|null $attributs Un tableau contenant les valeurs à binder (optionnel).
 * @return mixed Retourne un objet PDOStatement en cas de succès, sinon false en cas d'erreur.
 */
public function req(string $sql, ?array $attributs = null)
{
    // Récupération de l'instance unique de la connexion à la base de données (Singleton)
    $this->db = Db::getInstance();

    try {
        // Si des attributs sont fournis (requête préparée avec paramètres)
        if ($attributs !== null) {
            // Préparation de la requête SQL pour éviter les injections SQL
            $query = $this->db->prepare($sql);

            // Exécution de la requête en liant les paramètres fournis
            $query->execute($attributs);

            // Retourne l'objet PDOStatement contenant le résultat de la requête
            return $query;
        } else {
            // Si aucune donnée n'est fournie, exécution directe de la requête SQL
            return $this->db->query($sql);
        }
    } catch (Exception $e) {
        // En cas d'erreur, on enregistre le message d'erreur dans un fichier "error_log.txt"
        file_put_contents(
            'error_log.txt', 
            date('Y-m-d H:i:s') . ' - ' . $e->getMessage() . "\n", 
            FILE_APPEND
        );

        // Retourne false en cas d'échec
        return false;
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
}