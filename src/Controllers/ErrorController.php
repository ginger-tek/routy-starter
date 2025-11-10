<?php

namespace App\Controllers;

use GingerTek\Routy;

class ErrorController
{
  public static function NotFound(Routy $app)
  {
    $app->render('Errors/NotFound', ['title' => 'Page Not Found']);
  }

  public static function Unhandled(Routy $app)
  {
    $ex = $app->getCtx('ex');
    $app->status(500)->render('Errors/Unhandled', [
      'title' => 'Error',
      'model' => ['message' => $ex->getMessage()]
    ]);
  }
}