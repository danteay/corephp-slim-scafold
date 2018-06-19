<?php

use Controllers\PingController;

$app->get(
    '/ping',
    PingController::class . ':ping'
);