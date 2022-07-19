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

  public static function blog(Router $router)
  {
    $router->render('pages/blog');
  }

  public static function post(Router $router)
  {
    $router->render('pages/post');
  }

  public static function contact(Router $router)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      debug($_POST);
    }

    $router->render('pages/contact', []);
  }
}
