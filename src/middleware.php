<?php
// Application middleware

//$app->add(new \Middlewares\CorsMiddleware($container));
$app->add(new \Middlewares\IOMiddleware($container));
