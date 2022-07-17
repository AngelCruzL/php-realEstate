<?php

namespace Controllers;

use MVC\Router;
use Model\Estate;

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

  public static function create()
  {
    echo 'Crear propiedad';
  }

  public static function update()
  {
    echo 'Actualizar propiedad';
  }
}
