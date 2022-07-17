<?php

namespace Controllers;

use MVC\Router;

class EstateController
{
  public static function index(Router $router)
  {
    $router->render('estates/admin');
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
