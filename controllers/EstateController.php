<?php

namespace Controllers;

use MVC\Router;
use Model\Estate;
use Model\Seller;

class EstateController
{
  public static function index(Router $router)
  {
    $estates = Estate::all();
    $status = null;

    $router->render('estates/admin', [
      'estates' => $estates,
      'status' => $status,
    ]);
  }

  public static function create(Router $router)
  {
    $estate = new Estate;
    $sellers = Seller::all();

    $router->render('estates/create', [
      'estate' => $estate,
      'sellers' => $sellers,
    ]);
  }

  public static function update()
  {
    echo 'Actualizar propiedad';
  }
}
