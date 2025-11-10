<?php

namespace App;

use GingerTek\Routy;

class Routes
{
  public static function Index(Routy $app)
  {
    try {
      $app->get('/', \App\Controllers\HomeController::Index(...));
      // add routes here      
      $app->fallback(\App\Controllers\ErrorController::NotFound(...));
    } catch (\Exception $ex) {
      $app->use(\App\Controllers\ErrorController::Unhandled(...));
    }
  }
}