<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\RapportModel;

class RapportController extends Controller
{
    public function liste_rapports()
    {
        $rapportModel = new RapportModel();
        $rapport = $rapportModel->findAllRapport();

        $title = "Rapport";
        $this->render('rapport/liste_rapports', compact('title', 'rapport'));
    }

    public function add_rapport()
    {
        $rapportModel = new RapportModel();
        $animauxModel = new AnimalModel();
        $animaux = $animauxModel->findAll(); // Récupère tous les animaux

        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Vérifier si un rapport existe déjà pour cet animal
            $existingRapport = $rapportModel->findLastRapportByAnimalId($_POST['animal_id']);
            if ($existingRapport) {
                // Ouvrir une session avec le message d'erreur
                $_SESSION['message'] = "Un rapport existe déjà pour cet animal. Veuillez le modifier.";
                header('Location: /rapport/add_rapport');
                exit();
            }

            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'] ?? null,
                'nourriture_preconisee' => $_POST['nourriture_preconisee'] ?? null,
                'grammage_preconise' => $_POST['grammage_preconise'] ?? null,
                'date_passage' => $_POST['date_passage'] ?? null,
                'detail_etat' => $_POST['detail_etat'] ?? null,
                'date_heure' => $_POST['date_heure'] ?? null,
                'grammage_donne' => $_POST['grammage_donne'] ?? null,
                'nourriture_donnee' => $_POST['nourriture_donnee'] ?? null,
            ];

            // Hydratation du modèle et création du rapport
            $rapportModel->hydrate($data);
            $rapportModel->create();

            // Redirection vers la liste des rapports après la création
            header('Location: /rapport/liste_rapports');
            exit();
        }

        // Vue du formulaire d'ajout
        $title = "Ajouter un rapport";
        $this->render('rapport/add_rapport', compact('title', 'animaux'));
    }

    public function get_last_rapport($animalId)
    {
        $rapportModel = new RapportModel();
        $rapport = $rapportModel->findLastRapportByAnimalId($animalId);

        echo json_encode($rapport);
    }

    public function edit_rapport($id)
    {
        $rapportModel = new RapportModel();
        $rapport = $rapportModel->findRapport($id);

        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAll();

        // Vérifier si le rapport existe
        if (!$rapport) {
            header('Location: /rapport/liste_rapports');
            exit();
        }

        if (isset($_SESSION['user_id'])) {
            $currentUserId = $_SESSION['user_id'];
        } else {
            http_response_code(404);
            exit();
        }

        // Vérifier si la requête est de type POST pour traiter la soumission du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Préparer les données envoyées via le formulaire sous forme de tableau
            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'] ?? null,
                'nourriture_preconisee' => $_POST['nourriture_preconisee'] ?? null,
                'grammage_preconise' => $_POST['grammage_preconise'] ?? null,
                'date_passage' => $_POST['date_passage'] ?? null,
                'detail_etat' => $_POST['detail_etat'] ?? null,
                'date_heure' => $_POST['date_heure'] ?? null,
                'grammage_donne' => $_POST['grammage_donne'] ?? null,
                'nourriture_donnee' => $_POST['nourriture_donnee'] ?? null,
            ];

            // Hydratation de l'objet rapport avec les données du formulaire
            $rapportModel->hydrate($data);

            // Mise à jour du rapport dans la base de données
            $rapportModel->update($id);

            // Redirection après modification
            header('Location: /rapport/liste_rapports');
            exit();
        }

        // Vue du formulaire de modification
        $title = "Modifier un rapport";
        $this->render('rapport/edit_rapport', compact('title', 'rapport', 'animaux'));
    }

    public function delete_rapport($id)
    {
        $rapportModel = new RapportModel();
        $rapportModel->delete($id);

        header('Location: /rapport/liste_rapports');
        exit();
    }
}
