<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
  public static function login(Router $router)
  {
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $auth = new Admin($_POST);
      $errors = $auth->validateData();

      if (empty($errors)) {
        $result = $auth->userExists();

        if (!$result) {
          $errors = Admin::getErrors();
        } else {
          $isAuth = $auth->checkPassword($result);

          if (!$isAuth) $errors = Admin::getErrors();
        }
      }
    }

    $router->render('auth/login', [
      'errors' => $errors
    ]);
  }

  public static function logout()
  {
    echo 'logout';
  }
}
