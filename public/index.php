<?php

session_start();

require_once '../config.php';
require_once '../vendor/autoload.php';

use App\Core\Route;

Route::start($settings);
