<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 23.09.2018
 * Time: 16:40
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\ModelList;

include '../files/config.php';

class ControllerList extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new ModelList($settings);
        $this->view = new View();
    }

    function actionIndex()
    {
        $this->model->addData();
        $data = $this->model->getData();
        $this->view->generate('list_view.php', $data);
    }
}