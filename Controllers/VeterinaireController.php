<?php

namespace App\Controllers;

use App\Models\VeterinaireModel;
use App\Models\AnimalModel;
class VeterinaireController extends Controller
{

    
    // Affiche le tableau de bord vétérinaire
    public function index() {
        // Définir le titre de la page
        $title = "Tableau de bord vétérinaire";
    
        // Passer la variable à la vue
        $this->render('veterinaire/index', compact('title'));

    }

    public function ajouterRapport()
{
    // Logique pour gérer la nourriture des animaux
    $title = "Ajouter un rapport";
    $this->render('veterinaire/ajouterRapport', compact('title', 'animaux'));
}
public function saveRapport()
{
    // Récupérer les données du formulaire
    $data = [
        'animal_id' => $_POST['animal_id'],
        'etat' => $_POST['etat'],
        'nourriture' => $_POST['nourriture'],
        'grammage' => $_POST['grammage'],
        'date_passage' => $_POST['date_passage'],
        'detail_etat' => $_POST['detail_etat'] ?? null
    ];

    // Instancier le modèle vétérinaire
    $veterinaireModel = new VeterinaireModel();

    // Appeler la méthode pour ajouter le rapport
    if ($veterinaireModel->ajouterRapport($data)) {
        // Redirection après ajout réussi
        header("Location: /veterinaire/rapports");
        exit;
    } else {
        // Gérer l'erreur
        echo "Une erreur s'est produite lors de l'ajout du rapport.";
    }
}
 public function rapportEmploye()
{
  
    $title = "Rapport Employes";
    $this->render('veterinaire/rapportEmploye', compact('title'));
}
public function rapports()
{
  
    $title = "Rapports vétérinaires";
    $this->render('veterinaire/rapports', compact('title'));
}
    
}