<?php

namespace App\Models;

use App\Core\Model;

class ModelMain extends Model
{
    /**
     * ModelMain constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return bool|\PDOStatement
     */
    public function getData() {
        $query = "SELECT COUNT(t1.id) FROM form_db.tbl_1 t1";
        $count = $this->pdo->query($query);
        return $count;
    }
}
