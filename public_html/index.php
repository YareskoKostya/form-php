<?php

ini_set('display_errors', 1);
require_once '../vendor/autoload.php';
include_once '../files/config.php';

use App\Core\Route;

Route::start($settings);
