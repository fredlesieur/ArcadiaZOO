<?php

namespace App\Controllers;

use App\Models\VeterinaireModel;
use App\Models\AnimalModel;
use App\Models\HabitatsModel;
class VeterinaireController extends Controller

{
    public function index()
    {   
        
        $title = "Tableau de bord vétérinaire";
        $this->render('veterinaire/index', compact('title'));
    }

    public function ajouterRapport()
    {
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAllOrderedByName(); 

        $veterinaireModel = new VeterinaireModel();
        $veto = $veterinaireModel->findAll();

        $title = "Ajouter un rapport";
        $this->render('veterinaire/ajouterRapport', compact('title', 'animaux'));
    }

    public function saveRapports() 
    {
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAll(); // Récupère tous les animaux pour les afficher dans la liste déroulante

        $veterinaireModel = new VeterinaireModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'],
                'nourriture' => $_POST['nourriture'],
                'grammage' => $_POST['grammage'],
                'date_passage' => $_POST['date_passage'],
                'detail_etat' => $_POST['detail_etat']
            ];
           
            if ($veterinaireModel->ajouterRapport($data)) {
                header("Location: /veterinaire/rapports");
                exit();
            } else {
                echo "Une erreur s'est produite lors de l'ajout du rapport";
            }
        }
    }

    public function rapports()
    {
        $title = "Rapports vétérinaires";

        $veterinaireModel = new VeterinaireModel();
        $rapports = $veterinaireModel->selectRapportsWithAnimals();

        $this->render('veterinaire/rapports', compact('title', 'rapports'));
    }
    
   public function listeRapports() {
        $veterinaireModel = new VeterinaireModel();
        
        // Récupérer tous les rapports sans filtre
        $rapports = $veterinaireModel->getAllRapports();
    
        // Passer les rapports à la vue
        $this->render('veterinaire/rapports', compact('rapports'));
    }
    
     
    // Version mise à jour avec une redirection appropriée après modification
    public function modifierRapport($id)
{
    $veterinaireModel = new VeterinaireModel();
    $rapport = $veterinaireModel->selectRapportsWithAnimalsById($id);

    $animalModel = new AnimalModel();
    $animaux = $animalModel->findAll();

    // Vérifier si le rapport existe
    if (!$rapport) {
        header('Location: /veterinaire/rapports');
        exit();
    }

    // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Préparer les données envoyées via le formulaire sous forme de tableau
        $data = [
            'user_id' => $_SESSION['user_id'],
            'animal_id' => $_POST['id_animal'],
            'etat' => $_POST['etat'],
            'nourriture' => $_POST['nourriture'],
            'grammage' => $_POST['grammage'],
            'date_passage' => $_POST['date_passage'],
            'detail_etat' => $_POST['detail_etat']
        ];

        // Mise à jour du rapport dans la base de données
        $veterinaireModel->updateRapport($id, $data);

        // Redirection après modification
        header('Location: /veterinaire/rapports');
        exit();
    }

    // Afficher la vue avec le rapport à modifier
    $this->render('veterinaire/modifierRapport', compact('rapport', 'animaux'));
}

    
    public function supprimerRapport($rapport) {

       

            // Utiliser la méthode delete de ton modèle pour supprimer
            $VeterinaireModel = new VeterinaireModel();
            $VeterinaireModel->delete($rapport);

            // Redirection après suppression
            header('Location: /veterinaire/rapports');
            exit();
    }
    





    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $data = [
                'habitat_id' => $_POST['habitat_id'],
                'commentaire' => $_POST['rapport'],
                'user_id' => $_SESSION['user_id']  // Utiliser l'ID du vétérinaire connecté
            ];

            // Appeler le modèle pour créer le rapport
            $habitatModel = new HabitatsModel();
            $habitatModel->createReport($data);

            // Rediriger vers la page des rapports habitats après succès
            header('Location: /veterinaire/listeRapportHabitat');
            exit;
        }

        // Charger la liste des habitats pour le formulaire
        $habitatModel = new HabitatsModel();
        $habitats = $habitatModel->findAll();

        // Afficher le formulaire pour ajouter un rapport
        $this->render('veterinaire/rapportHabitat', compact('habitats'));
    }

    public function listeRapportHabitat()
    {
        $title = "Liste des rapports sur les habitats";

        // Récupérer les rapports sur les habitats
        $habitatModel = new HabitatsModel();
        $rapportsHabitats = $habitatModel->getRapportsHabitats();

        // Afficher la vue avec les rapports sur les habitats
        $this->render('veterinaire/listeRapportHabitat', compact('title', 'rapportsHabitats'));
    }


    //modification d un rapportHabitat
    public function edit($id)
    {
        $habitatModel = new HabitatsModel();
        $habitat = $habitatModel->find($id);

        // Récupérer le nom du vétérinaire depuis la session
        $veterinaire_nom = $_SESSION['user_nom_prenom'];  // Assurez-vous que 'user_nom_prenom' est bien stocké lors de la connexion

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les nouvelles données du formulaire
            $data = [
                'commentaire' => $_POST['rapport'],
                'user_id' => $_SESSION['user_id']  // ID du vétérinaire connecté
            ];

            // Mettre à jour le rapport
            $habitatModel->updateReport($id, $data);

            // Rediriger vers la page des rapports habitats
            header('Location: /veterinaire/listeRapportHabitat'); // Vérifie que cette route existe
            exit;
        }

        // Passer les données actuelles à la vue
        $this->render('veterinaire/modifierRapportHabitat', compact('habitat', 'veterinaire_nom'));
    }

    public function delete($id)
    {
        $habitatModel = new HabitatsModel();
        $habitatModel->deleteReport($id);

        // Rediriger après suppression
        header('Location: /veterinaire/index'); // Change cette route selon tes besoins
        exit;
    }

    public function rapportsHabitats()
    {
        $title = "Liste des rapports sur les habitats";

        // Utiliser la méthode du modèle HabitatsModel pour récupérer les rapports sur les habitats
        $habitatModel = new HabitatsModel();
        $rapportsHabitats = $habitatModel->getRapportsHabitats();  // Récupérer les rapports sur les habitats

        // Afficher la vue avec les rapports sur les habitats
        $this->render('veterinaire/rapportsHabitats', compact('title', 'rapportsHabitats'));
    }

}