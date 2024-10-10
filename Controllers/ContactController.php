<?php

namespace App\Controllers;
use App\Models\ContactModel;
use App\Models\CoordonneeModel;


class ContactController extends Controller
{
    public function index()
    {
        $ContactModel = new ContactModel;
        $horaires = $ContactModel->findAll();

        $CoordonneeModel = new CoordonneeModel;
        $coordonnees = $CoordonneeModel->findAll();

        $this->render("contact/index", compact("horaires", "coordonnees"));
    }

}
