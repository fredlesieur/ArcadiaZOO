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

        $title = "Liste des rapports";
        $this->render('rapport/liste_rapports', compact('title', 'rapport'));
    }

    public function add_rapport()
    {
        $rapportModel = new RapportModel();
        $animauxModel = new AnimalModel();
        $animaux = $animauxModel->findAllOrderedByName();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'] ?? null,
                'nourriture_preconisee' => $_POST['nourriture_preconisee'] ?? null,
                'grammage_preconise' => $_POST['grammage_preconise'] ?? null,
                'date_passage' => $_POST['date_passage'] ?? null,
                'detail_etat' => $_POST['detail_etat'] ?? null,
                'date_heure' => ($_SESSION['role'] === 'employe') ? $_POST['date_heure'] : null,
                'grammage_donne' => ($_SESSION['role'] === 'employe') ? $_POST['grammage_donne'] : null,
                'nourriture_donnee' => ($_SESSION['role'] === 'employe') ? $_POST['nourriture_donnee'] : null,
            ];

            $rapportModel->hydrate($data);
            $existingRapport = $rapportModel->findLastRapportByAnimalId($_POST['animal_id']);
            
            if ($existingRapport) {
                $_SESSION['message'] = "Un rapport existe déjà pour cet animal.";
                return $this->render('rapport/add_rapport', compact('animaux'));
            }

            $rapportModel->create();
            header('Location: /rapport/liste_rapports');
            exit();
        }

        $title = "Ajouter un rapport";
        $this->render('rapport/add_rapport', compact('title', 'animaux'));
    }

    public function edit_rapport($id)
    {
        $rapportModel = new RapportModel();
        $rapport = $rapportModel->findRapport($id);
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAll();

        if (!$rapport) {
            header('Location: /rapport/liste_rapports');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'etat' => $_POST['etat'] ?? null,
                'nourriture_preconisee' => $_POST['nourriture_preconisee'] ?? null,
                'grammage_preconise' => $_POST['grammage_preconise'] ?? null,
                'date_passage' => $_POST['date_passage'] ?? null,
                'detail_etat' => $_POST['detail_etat'] ?? null,
                'date_heure' => ($_SESSION['role'] === 'employe') ? $_POST['date_heure'] : null,
                'grammage_donne' => ($_SESSION['role'] === 'employe') ? $_POST['grammage_donne'] : null,
                'nourriture_donnee' => ($_SESSION['role'] === 'employe') ? $_POST['nourriture_donnee'] : null,
            ];
            $rapportModel->hydrate($data);
           

            $rapportModel->update($id);
            header('Location: /rapport/liste_rapports');
            exit();
        }

        $title = "Modifier un rapport";
        $this->render('rapport/edit_rapport', compact('title', 'rapport', 'animaux'));
    }

    public function delete_rapports($id)
    {
        $rapportModel = new RapportModel();
        $rapportModel->delete($id);
        header('Location: /rapport/liste_rapports');
        exit();
    }

    public function get_last_rapport($animalId)
    {
        $rapportModel = new RapportModel();
        $lastRapport = $rapportModel->findLastRapportByAnimalId($animalId);

        header('Content-Type: application/json');
        echo json_encode($lastRapport);
        exit();
    }
}
