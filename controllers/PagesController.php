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

  public static function about(Router $router)
  {
    $router->render('pages/about');
  }

  public static function announcements(Router $router)
  {
    $estates = Estate::all();

    $router->render('pages/announcements', [
      'estates' => $estates,
    ]);
  }

  public static function announcement(Router $router)
  {
    $id = validateIdOrRedirect('/anuncios');
    $estate = Estate::find($id);

    $router->render('pages/announcement', [
      'estate' => $estate,
    ]);
  }
}
