<?php

namespace App;

use GingerTek\Routy;

class Config
{
  public static function loadEnv(): void
  {
    if (!in_array(php_sapi_name(), ['cli', 'server-cli'])) {
      $root = dirname(__DIR__);
      $path = "$root/appsettings.local";
      if (file_exists($path))
        ['ENV_FILE' => $envFile] = parse_ini_file($path);
      if (!isset($envFile))
        $envFile = '.env';
      if (file_exists("$root/$envFile"))
        foreach (parse_ini_file("$root/$envFile") as $k => $v)
          putenv("$k=$v");
    }
  }

  public static function renderStrategy(): callable
  {
    return function (string $view, array $context, Routy $app): string {
      ob_start();
      extract($context);
      $view = $app->getConfig('root') . "src/Views/$view.php";
      include_once $app->getConfig('root') . 'src/Layouts/Default.php';
      return ob_get_clean() ?? '';
    };
  }
}