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

  public function checkRoutes()
  {
    $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    if ($httpMethod === 'GET') {
      $controller = $this->routesGet[$currentUrl] ?? null;

      if ($controller) {
        call_user_func($controller, $this);
      } else {
        echo '404 - Page not found';
      }
    }
  }

  public function render($view)
  {
    include __DIR__ . '/views/' . $view . '.php';
  }
}
