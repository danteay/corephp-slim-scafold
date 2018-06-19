<?php

return function ($c) {
    return function ($request, $response) use ($c) {
        return $c['renderer']->render($response, 'errors/404.phtml');
    };
};