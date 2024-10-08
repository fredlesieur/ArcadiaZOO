<?php

namespace App\Controllers;
use App\Models\AvisModel;
use App\Models\ServModel;
use App\Models\AnimalModel;
use App\Models\EmployeModel;
use App\Models\Model;


class EmployeController extends Controller
{
    public function index()
    {   
        $title = "Tableau de bord employé";
        $this->render('employe/index', compact('title'));
    }

    public function gererAvis()
    {
        $avisModel = new AvisModel();
        $avisEnAttente = $avisModel->findBy(['valid' => 0]); // Récupère les avis non validés

        $this->render('employe/gererAvis', compact('avisEnAttente'));
    }

    public function validerAvis($id)
    {
        $avisModel = new AvisModel();
        $avisModel->validerAvis($id);

        header('Location: /employe/gererAvis');
        exit;
    }

    public function invaliderAvis($id)
    {
        $avisModel = new AvisModel();
        $avisModel->invaliderAvis($id);

        header('Location: /employe/gererAvis');
        exit;
    }


    public function gererServices()
{
    $title = "Gérer les services";
    $ServModel = new ServModel();

    // Récupérer tous les services directement sans les organiser par catégorie
    $services = $ServModel->findAll();

    // Debug pour vérifier les services récupérés
    if (empty($services)) {
        echo '<p>Aucun service récupéré depuis la base de données.</p>';
    } else {
        echo '<pre>';
        print_r($services); // Afficher les données récupérées pour vérifier qu'elles sont bien là
        echo '</pre>';
    }
    exit; // Arrêter l'exécution ici pour voir les données

    // Transmettre directement les services à la vue sans les organiser
    $this->render("service/index", compact("title", "services"));
}


    public function ajouterService()
{
    $ServModel = new ServModel();
    if ($_POST) {
        $categorie = !empty($_POST['new-category']) ? $_POST['new-category'] : $_POST['categorie'];

        $ServModel->setName($_POST['name']);
        $ServModel->setDescription($_POST['description']);
        $ServModel->setCategorie($categorie);
        $ServModel->setDuree($_POST['duree']);
        $ServModel->setTarifs($_POST['tarifs']);
        $ServModel->setHoraires($_POST['horaires']);

        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . '_' . $_FILES['image']['name'];
            $imagePath = 'assets/images/' . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $ServModel->setImage($imageName);
        }

        if (!empty($_FILES['image2']['name'])) {
            $imageName2 = time() . '_2_' . $_FILES['image2']['name'];
            $imagePath2 = 'assets/images/' . $imageName2;
            move_uploaded_file($_FILES['image2']['tmp_name'], $imagePath2);
            $ServModel->setImage2($imageName2);
        }

        $ServModel->create();
    }
    header("Location: /employe/gererServices");
}



    public function supprimerService($id)
    {
        $ServModel = new ServModel();
        $ServModel->delete($id);
        header("Location: /employe/gererServices");
    }



  public function modifierService($id)
{
    $ServModel = new ServModel();
    $service = $ServModel->find($id);

    if (!$service) {
        header('Location: /employe/gererServices');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categorie = !empty($_POST['new-category']) ? $_POST['new-category'] : $_POST['categorie'];

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'image' => $service['image'],
            'image2' => $service['image2'],
            'categorie' => $categorie,
            'duree' => $_POST['duree'],
            'tarifs' => $_POST['tarifs'],
            'horaires' => $_POST['horaires']
        ];

        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . '_' . $_FILES['image']['name'];
            $imagePath = 'assets/images/' . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $data['image'] = $imageName;
        }

        if (!empty($_FILES['image2']['name'])) {
            $imageName2 = time() . '_2_' . $_FILES['image2']['name'];
            $imagePath2 = 'assets/images/' . $imageName2;
            move_uploaded_file($_FILES['image2']['tmp_name'], $imagePath2);
            $data['image2'] = $imageName2;
        }

        $ServModel->updateService($id, $data);
        header('Location: /employe/gererServices');
        exit();
    }

    $this->render('employe/modifierService', compact('service'));
}

    
    public function gererNourriture()
{
    $animalModel = new AnimalModel();  // Instancie le modèle des animaux
    $animaux = $animalModel->findAll(); // Récupère tous les animaux pour les afficher dans la liste déroulante
    
    $rapportModel = new AnimalModel();
    
    // Assurez-vous que $id est défini
    $id = $_GET['animal_id'] ?? null; // Par exemple, récupérez l'ID de l'animal depuis les paramètres GET
    if ($id) {
        $rapport = $rapportModel->getRapportByAnimalId($id);
    } else {
        $rapport = []; // Ou gérez l'absence d'ID d'animal comme vous le souhaitez
    }

    $this->render('employe/gererNourriture', compact('rapport', 'animaux'));
}


    public function enregistrerRapport()
{
    $employeModel = new EmployeModel();
    $animalModel = new AnimalModel();
    $animaux = $animalModel->findAll(); // Récupère tous les animaux pour les afficher dans la liste déroulante

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Appel de la méthode pour enregistrer un rapport
        $employeModel->enregistrerRapportEmploye(
            $_SESSION['user_id'],       
            $_POST['animal_id'],     
            $_POST['nourriture'],    
            $_POST['quantite'],      
            $_POST['date'],        
            $_POST['observations']    
        );

        // Redirection après l'enregistrement
        header('Location: /employe/listeRapport');
        exit;
    }

    $this->render('employe/gererNourriture', compact('animaux'));
}
public function listeRapport()
{
    $employeModel = new EmployeModel(); // Instancie le modèle
    $rapports = $employeModel->getRapports(); // Récupère tous les rapports de nourrissage via le modèle

    $this->render('employe/listeRapport', compact('rapports')); // Passe les rapports à la vue 'listeRapport'
}
public function modifierRapport($id)
{
    $employeModel = new EmployeModel();
    $rapport = $employeModel->getRapportById($id); // Récupère les détails du rapport à partir de son ID

    // Vérification si le rapport existe
    if (!$rapport) {
        header('Location: /employe/listeRapport');
        exit();
    }

    // Affiche la vue avec le rapport à modifier
    $this->render('employe/modifierRapport', compact('rapport'));
}
public function enregistrerModification($id)
{
    $employeModel = new EmployeModel();
    
    // Récupérer les valeurs du formulaire
    $nourriture = $_POST['nourriture'];
    $quantite = $_POST['quantite'];
    $date = $_POST['date'];
    $observations = $_POST['observations'];

    // Mettre à jour le rapport dans la base de données
    $employeModel->updateRapport($id, $nourriture, $quantite, $date, $observations);

    // Rediriger vers la liste des rapports après la mise à jour
    header('Location: /employe/listeRapport');
    exit();
}

public function supprimerRapport($id)
{
    $employeModel = new EmployeModel();

    // Supprime le rapport en appelant la méthode du modèle
    $employeModel->deleteRapport($id);

    // Rediriger vers la liste des rapports après la suppression
    header('Location: /employe/listeRapport');
    exit();
}

}