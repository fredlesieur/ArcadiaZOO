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