<?php

namespace App\Models;
use App\config\Db;
class CarouselModel extends Model
{
    protected $id;
    protected $category;
    protected $item_name;
    protected $image_path;
    protected $alt_text;


    public function __construct() {
        $this->table = "carousel_images";
    }
 
 
    // Méthode pour récupérer toutes les images avec leurs textes alternatifs
    public function findAllImages()
{
    // Requête SQL
    $sql = "SELECT item_name, image_path, alt_text FROM carousel_images";

    // Exécution de la requête avec req()
    $result = $this->req($sql);

    // Si la requête retourne false, gestion de l'erreur
    if ($result === false) {
        echo "Erreur lors de l'exécution de la requête SQL.<br>";
        return [];
    }

    // Retourne les résultats s'ils existent
    return $result->fetchAll();
}
    // Getters et setters (comme dans ta version d'origine)
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getItemName()
    {
        return $this->item_name;
    }

    public function setItemName($item_name)
    {
        $this->item_name = $item_name;
        return $this;
    }

    public function getImagePath()
    {
        return $this->image_path;
    }

    public function setImagePath($image_path)
    {
        $this->image_path = $image_path;
        return $this;
    }

    public function getAltText()
    {
        return $this->alt_text;
    }

    public function setAltText($alt_text)
    {
        $this->alt_text = $alt_text;
        return $this;
    }
}
