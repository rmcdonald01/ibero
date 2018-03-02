<?php

use App\Controllers\RestartController;

$app->get('/', HomeController::class . ':index');
$app->get('/ap', HomeController::class . ':index');
