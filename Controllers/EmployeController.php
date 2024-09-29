<?php

namespace App\Controllers;
use App\Models\AvisModel;
class EmployeController extends Controller
{
    public function index()
    {
        $title = "Tableau de bord employé";
        $this->render('/employe/index', compact('title'));
    }

    public function gererAvis()
    {
        $avisModel = new AvisModel();
        $avisEnAttente = $avisModel->findBy(['valid' => 0]); // Récupère les avis non validés

        $this->render('/employe/gererAvis', compact('avisEnAttente'));
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

    public function gererNourriture()
{
    // Logique pour gérer la nourriture des animaux
    $title = "Gérer la Nourriture des Animaux";
    $this->render('/employe/gererNourriture', compact('title'));
}


}