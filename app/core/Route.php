<?php

namespace App\Core;

class Route {

    static function start() {
        // controller and default action
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // get the name of the controller
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // get the name of the action
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // add prefixes
        $controller_name = 'Controller' . $controller_name;
        $action_name = 'action' . $action_name;

        // take file with controller class
        $controller_file = $controller_name . '.php';
        $controller_path = "app/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "app/controllers/" . $controller_file;
        } else {
            /*
              правильно было бы кинуть здесь исключение,
              но для упрощения сразу сделаем редирект на страницу 404
             */
            Route::ErrorPage404();
        }

        // create a controller
        $controller_name = "app\\controllers\\" . $controller_name;
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // call the controller action
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    }

    function ErrorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}
