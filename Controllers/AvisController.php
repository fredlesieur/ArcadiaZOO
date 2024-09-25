<?php

namespace App\Controllers;
use App\Models\AvisModel;
class AvisController extends AccueilController
{
    public function ajouterAvis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $pseudo = $_POST['pseudo'] ?? '';
            $comment = $_POST['comment'] ?? '';
        
            $maxCommentLength = 400;
            if (!empty($pseudo) && !empty($comment) && strlen($comment) <= $maxCommentLength){
            $AvisModel = new AvisModel();
            $result = $AvisModel->saveAvis($pseudo, $comment);
        }else {
            $_SESSION['error'] = "L'avis est trop long il ne doit pas dépasser 400 caractères.";
        }
        header("Location:/");
        exit;
        }

    }
}