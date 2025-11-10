<?php

namespace App\Controllers;

use GingerTek\Routy;

class HomeController
{
  public static function Index(Routy $app)
  {
    $app->render('Home', ['title' => 'Welcome!']);
  }
}