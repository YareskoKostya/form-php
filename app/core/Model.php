<?php

namespace App\Core;

class Model {

    public $pdo;

    public function __construct(array $settings) {
        try{
            if (!$this->pdo) {
                throw new \Exception('Could not connect to DB ');
            }
            $this->pdo = new \PDO(
                sprintf (
                    'mysql:host=%s;dbname=%s;port=%s;charset=%s',
                    $settings['host'],
                    $settings['name'],
                    $settings['port'],
                    $settings['charset']
                ),
                $settings['username'],
                $settings['password']);
        } catch (\Exception $e){
                echo $e->getMessage();
        }
    }

    public function getData() {

    }

}
