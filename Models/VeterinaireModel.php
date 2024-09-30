<?php

namespace App\Models;
use App\Models\AnimalModel;

class VeterinaireModel extends Model {

   protected $animal_id;
    protected $etat;
    protected $nourriture;
    protected $grammage;
    protected $date_passage;
    protected $table = 'rapports_veterinaires'; // Nom de la table contenant les rapports vétérinaires
    protected $id;
    protected $user_id;
    protected $detail_etat;

    
        public function __construct() {
            // Appel au constructeur parent si nécessaire
            parent::__construct(); 
            // Initialisation des propriétés si besoin
            $this->table = 'rapports_veterinaires'; 
        }

    // Méthode pour ajouter un rapport vétérinaire (en utilisant create)
    public function ajouterRapport(array $data): bool
{
    // Hydrate l'objet avec les données
    $this->hydrate($data);

    // Préparer la requête pour ajouter le rapport
    $sql = "INSERT INTO rapports_veterinaires (animal_id, etat, nourriture, grammage, date_passage, detail_ett)
            VALUES (:animal_id, :etat, :nourriture, :grammage, :date_passage, :detail_ett)";

    // Exécuter la requête avec les attributs corrects
    return $this->req($sql, [
        'animal_id' => $this->animal_id,
        'etat' => $this->etat,
        'nourriture' => $this->nourriture,
        'grammage' => $this->grammage,
        'date_passage' => $this->date_passage, 
    ]);
}


    // Méthode pour récupérer tous les rapports
    public function getAllRapports() {
        return $this->findAll(); // Utilisation de findAll existant dans ton modèle
    }

    // Méthode pour récupérer les rapports d'un animal spécifique
    public function getRapportsByAnimal($animal_id) {
        return $this->findBy(['animal_id' => $animal_id]); // Utilisation de findBy existant
    }

    public function saveRapport() {
        // Récupérer les données du formulaire
        $data = [
            'animal_id' => $_POST['animal_id'],
            'etat' => $_POST['etat'],
            'nourriture' => $_POST['nourriture'],
            'grammage' => $_POST['grammage'],
            'date_passage' => $_POST['date_passage'],
            'detail_ett' => $_POST['detail_ett'] ?? null, // facultatif
        ];
    
        // Appeler la méthode du modèle pour ajouter un rapport
        $this->VeterinaireModel->ajouterRapport($data);
    
        // Redirection après ajout réussi
        header("Location: /veterinaire/rapports");
        exit;
    }
    
}
