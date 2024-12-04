<?php

namespace App\Controllers;
use App\Models\AvisModel;

class AvisController extends Controller
{
    public function addAvis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
           
            $avisModel = new AvisModel();
            $data = [
                'pseudo' => $_POST['pseudo'] ?? '',
                'comment' => $_POST['comment'] ?? ''
            ];

            $maxCommentLength = 400;
            if (!empty($data['pseudo']) && !empty($data['comment']) && strlen($data['comment']) <= $maxCommentLength) {
                $avisModel->hydrate($data);
                $avisModel->create();
                $_SESSION['success'] = "Votre avis a été pris en compte !";
            } else {
                $_SESSION['error'] = "L'avis est trop long. Il ne doit pas dépasser 400 caractères.";
            }
            header("Location: /#formulaire-avis");
            exit;
        }
    }

    public function gererAvis()
    {
        $avisModel = new AvisModel();
        $avisEnAttente = $avisModel->getPendingReviews(); // Récupère les avis non validés
        $this->render('avis/gerer_avis', compact('avisEnAttente'));
    }

    public function validerAvis($id)
    {
        $avisModel = new AvisModel();
        $avisModel->approveReview($id);
        header('Location: /avis/gererAvis');
        exit;
    }

    public function invaliderAvis($id)
    {
        $avisModel = new AvisModel();
        $avisModel->rejectReview($id);
        header('Location: /avis/gererAvis');
        exit;
    }
    public function listeAvis()
    {
        $avisModel = new AvisModel();
        $Avis = $avisModel->getAllValidatedReviews(); // Récupère les avis validés
        $this->render('avis/index', compact('Avis'));
    }

    public function deleteAvis($id)
    {
        $avisModel = new AvisModel();
        $avis = $avisModel->find($id);

        if ($avis) {
            $avisModel->delete($id);
            $_SESSION['success'] = "L'avis a été supprimé avec succès.";
        } else {
            $_SESSION['error'] = "L'avis que vous essayez de supprimer n'existe pas.";
        }

        header("Location: /avis/listAvis");
        exit;
    }
}
