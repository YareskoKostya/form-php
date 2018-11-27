<?php

namespace App\Controllers;
use App\Core\Controller;

class ControllerMain extends Controller
{
    function actionIndex() {
        $this->view->generate('MainView.php');
    }
}