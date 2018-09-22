<?php

namespace App\Core;

class Route {

    static function start()
    {
        // controller and default action
        $controller_name = 'Main';
        $action_name = 'Index';

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
        $controller_path = "../app/controllers/" . $controller_file;

        try {
            if (!file_exists($controller_path)) {
                throw new \Exception('Could not find file');
            }
            include "../app/controllers/" . $controller_file;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        // create a controller
        $controller_name = "App\\Controllers\\" . $controller_name;
        $controller = new $controller_name;
        $action = $action_name;

        try {
            if (!method_exists($controller, $action)) {
                throw new \Exception('Could not find method');
            }
            // call the controller action
            $controller->$action();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
