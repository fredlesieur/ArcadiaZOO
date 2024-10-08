<?php
namespace App\Models;

use App\Config\Db;


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

    //on boucle pour eclater le tableau
    foreach($this as $champ => $valeur)
    {
        // INSERT INTO annonce (titre, description, prix, ...) VALUES (?, ?, ?)
        if($valeur != null && $champ != 'db' && $champ != 'table'){
        $champs[] = $champ;
        $inter[] = "?";
        $valeurs[] = $valeur;
        }
    }

    // on transforme le tableau champ en une chaine de caractères
    $liste_champs = implode(', ', $champs);
    $liste_inter = implode(', ', $inter);

    // on exécute la requete
    return $this->req('INSERT INTO '.$this->table. ' ('. $liste_champs.') VALUES('.$liste_inter.')', $valeurs);
    
} 

public function update(int $id)
{
    $champs = [];
    $valeurs = [];

    // On boucle pour éclater le tableau
    foreach ($this as $champ => $valeur) {
        if ($valeur != null && $champ != 'db' && $champ != 'table') {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
    }
    $valeurs[] = $id;

    // Vérifier s'il y a des champs à mettre à jour
    if (empty($champs)) {
        throw new \Exception('Aucun champ à mettre à jour');
    }

    // On transforme le tableau champ en une chaîne de caractères
    $liste_champs = implode(', ', $champs);

    // Loguer la requête SQL avant l'exécution
    $sql = 'UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?';
    error_log('Requête SQL : ' . $sql);
    error_log('Valeurs : ' . print_r($valeurs, true));

    // Exécuter la requête
    return $this->req($sql, $valeurs);
}


public function delete(int $id)
{
    return $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
}



   public function req(string $sql, array $attributs = null)
   {
        // on récupère l'instance de DB
        $this->db = Db::getInstance();

        //on verifie si on a des attributs
        if($attributs !== null){
            // requete préparée
            $query = $this->db->prepare($sql); 
            $query->execute($attributs);

            return $query;
        }else{
            //requete simple
            return $this->db->query($sql);
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
}