<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 22.09.2018
 * Time: 14:19
 */

namespace App\Controllers;
use App\Core\Controller;

class ControllerMain extends Controller
{
    function actionIndex() {
        $this->view->generate('MainView.php');
    }
}