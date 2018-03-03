<?php

use App\Controllers\HomeController;
use App\Controllers\RestartController;

$app->get('/', HomeController::class . ':index');
$app->get('/ap', RestartController::class . ':index');
