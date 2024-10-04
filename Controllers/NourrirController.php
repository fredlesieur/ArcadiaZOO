<?php

namespace App\Controllers;

use App\Models\NourrirModel;
use App\Models\AnimalModel;

class NourrirController extends Controller
{
    public function index()
    {
        // Afficher tous les rapports
        $nourrirModel = new NourrirModel();
        $rapports = $nourrirModel->findAll();
        
        $this->render('employe/index', compact('rapports'));
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'animal_id' => $_POST['animal_id'],
                'nourriture' => $_POST['nourriture'],
                'quantite' => $_POST['quantite'],
                'date' => $_POST['date'],
                'observations' => $_POST['observations']
            ];

            $nourrirModel = new NourrirModel();
            $nourrirModel->createReport($data);

            header('Location: /employe/index');
            exit;
        }

        // Charger la liste des animaux pour le formulaire
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAll();

        $this->render('employe/create', compact('animaux'));
    }

    public function edit($id)
    {
        $nourrirModel = new NourrirModel();
        $rapport = $nourrirModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'animal_id' => $_POST['animal_id'],
                'nourriture' => $_POST['nourriture'],
                'quantite' => $_POST['quantite'],
                'date' => $_POST['date'],
                'observations' => $_POST['observations']
            ];

            $nourrirModel->updateReport($id, $data);

            header('Location: /employe/index');
            exit;
        }

        // Charger la liste des animaux pour le formulaire
        $animalModel = new AnimalModel();
        $animaux = $animalModel->findAll();

        $this->render('employe/edit', compact('rapport', 'animaux'));
    }

    public function delete($id)
    {
        $nourrirModel = new NourrirModel();
        $nourrirModel->deleteReport($id);

        header('Location: /employe/index');
        exit;
    }
}
