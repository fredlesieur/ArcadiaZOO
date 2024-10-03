<?php

namespace App\Controllers;
use App\Models\AvisModel;
use App\Models\ServModel;
use App\Models\AnimalModel;
use App\Models\EmployeModel;


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
        $services = $ServModel->findAll();
        $this->render("employe/gererServices", compact("title","services"));
    }

    public function ajouterService()
{
    $ServModel = new ServModel();
    if ($_POST) {
        $ServModel->setName($_POST['name']);
        $ServModel->setDescription($_POST['description']);
        $ServModel->setCategorie($_POST['categorie']);
        $ServModel->setDuree($_POST['duree']);
        $ServModel->setTarifs($_POST['tarifs']);
        $ServModel->setHoraires($_POST['horaires']);

        if (!empty($_FILES['image']['name'])) {
            // Spécifier le chemin complet de l'image
            $imageName = time() . '_' . $_FILES['image']['name'];
            $imagePath = 'assets/images/' . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $ServModel->setImage($imageName); // Enregistrer le nom de l'image en base
        }

        if (isset($_POST['id']) && $_POST['id'] != '') {
            $ServModel->update($_POST['id']);
        } else {
            $ServModel->create();
        }
    }
    header("Location: /employe/gererServices");
}


    public function modifierService($id)
    {
        $ServModel = new ServModel();
        $service = $ServModel->find($id);
        $this->render("employe/gererServices", compact("service"));
    }

    public function supprimerService($id)
    {
        $ServModel = new ServModel();
        $ServModel->delete($id);
        header("Location: /employe/gererServices");
    }

    public function gererNourriture()
{
    $animalModel = new AnimalModel();  // Instancie le modèle des animaux
    $animaux = $animalModel->findAll(); // Récupère tous les animaux pour les afficher dans la liste déroulante

    // Passe la liste des animaux à la vue 'gererNourriture'
    $this->render('employe/gererNourriture', compact('animaux'));
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
        header('Location: /employe/gererNourriture');
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
}