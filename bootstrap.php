<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/app/helpers.php";
require_once __DIR__ . "/router/routes.php";

use Dotenv\Dotenv;
use Pecee\SimpleRouter\SimpleRouter;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

SimpleRouter::setDefaultNamespace('\App\Controllers\\');
SimpleRouter::start();