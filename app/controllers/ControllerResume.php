<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 25.09.2018
 * Time: 20:21
 */

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ModelResume;
use App\Core\View;

class ControllerResume extends Controller
{
    function __construct($settings) {
        parent::__construct();
        $this->model = new ModelResume($settings);
        $this->view = new View();
    }

    function actionIndex() {
        $data = $this->model->getData();
        $this->view->generate('ResumeView.php', $data);
    }
}