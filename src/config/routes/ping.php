<?php

use Controllers\PingController;

$app->get(
    '/',
    PingController::class . ':index'
);

$app->get(
    '/ping',
    PingController::class . ':ping'
);