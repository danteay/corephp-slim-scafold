<?php

return function ($c) {
    $url = getenv('REDIS_URL');

    if (!empty($url)) {
        $redis = new \Predis\Client($url);
        return $redis;
    }

    return null;
};