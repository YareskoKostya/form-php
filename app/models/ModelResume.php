<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 25.09.2018
 * Time: 20:23
 */

namespace App\Models;

use App\Core\Model;

class ModelResume extends Model
{
    public function __construct(array $settings)
    {
        parent::__construct($settings);
    }

    public function getData() {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM resume_db.user_resume WHERE id = :id";
        $usresume = $this->pdo->prepare($query);
        $usresume->execute(['id' => $id]);
        return $usresume;
    }
}