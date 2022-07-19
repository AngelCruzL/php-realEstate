<?php

namespace MVC;

class Router
{
  public $routesGet = [];
  public $routesPost = [];

  public function get($url, $controller)
  {
    $this->routesGet[$url] = $controller;
  }

  public function post($url, $controller)
  {
    $this->routesPost[$url] = $controller;
  }

  public function checkRoutes()
  {
    session_start();
    $isAuth = $_SESSION['logged'] ?? false;

    $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $protectedRoutes = [
      '/admin',
      '/propiedades/crear',
      '/propiedades/actualizar',
      '/propiedades/eliminar',
      '/vendedores/crear',
      '/vendedores/actualizar',
      '/vendedores/eliminar'
    ];

    if ($httpMethod === 'GET') {
      $controller = $this->routesGet[$currentUrl] ?? null;
    } else {
      $controller = $this->routesPost[$currentUrl] ?? null;
    }

    if (!$isAuth && in_array($currentUrl, $protectedRoutes)) {
      header('Location: /');
      return;
    }

    if ($controller) {
      call_user_func($controller, $this);
    } else {
      echo '404 - Page not found';
    }
  }

  public function render($view, $data = [])
  {
    foreach ($data as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include __DIR__ . '/views/' . $view . '.php';

    $content = ob_get_clean();
    $isAuth = $_SESSION['logged'] ?? false;
    include __DIR__ . '/views/layout.php';
  }
}
