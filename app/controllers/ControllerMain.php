<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ModelMain;

class ControllerMain extends Controller
{
    /**
     * ControllerMain constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->model = new ModelMain();
    }

    /**
     *
     */
    function actionIndex() {
        $data = $this->model->getData();
        $this->view->generate('MainView.php', $data);
    }
}