<?php

namespace Controllers;

use MVC\Router;
use Model\Estate;

class PagesController
{
  public static function index(Router $router)
  {
    $isIndex = true;
    $estates = Estate::get(3);

    $router->render('pages/index', [
      'isIndex' => $isIndex,
      'estates' => $estates,
    ]);
  }
}
