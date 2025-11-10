<?php

date_default_timezone_set('America/New_York');

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \GingerTek\Routy([
  'root' => __DIR__ . '/../',
  'render' => \App\Config::renderStrategy(),
]);

\App\Config::loadEnv();
$app->use(\App\Routes::Index(...));