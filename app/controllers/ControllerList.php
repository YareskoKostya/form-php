<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ModelList;

class ControllerList extends Controller
{
    /**
     * ControllerList constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->model = new ModelList();
    }

    /**
     *
     */
    function actionPage()
    {
        $data = $this->model->getData();
        $this->view->generate('ListView.php', $data);
    }

    /**
     *
     */
    function actionForm1()
    {
        $this->model->addDataForm1();
    }

    /**
     *
     */
    function actionForm2()
    {
        $this->model->addDataForm2();
    }
}
