<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 23.09.2018
 * Time: 16:48
 */

namespace App\Models;


use App\Core\Model;

class ModelList extends Model
{
    public function __construct(array $settings)
    {
        parent::__construct($settings);
    }

    
}