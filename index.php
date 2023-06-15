<?php

use Dotenv\Dotenv;
use Fakeheal\CorsAnywhere\Exceptions\CorsAnywhereException;
use Fakeheal\CorsAnywhere\Proxy;

require 'vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load();

try {
    $allowedHosts = explode(',', $_ENV['ALLOWED_HOSTS'] ?? '');
    (new Proxy($allowedHosts))->handle();
} catch (CorsAnywhereException $e) {
    die($e->getMessage());
}