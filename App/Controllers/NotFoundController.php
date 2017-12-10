<?php

namespace App\Controllers;

use System\Controller;

class NotFoundController extends Controller
{
    public function index()
    {
        return $this->view->render('not-found');
    }
}