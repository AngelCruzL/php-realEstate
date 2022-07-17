<?php

namespace Controllers;

use MVC\Router;
use Model\Seller;

class SellerController
{
  public static function create(Router $router)
  {
    $seller = new Seller;
    $errors = Seller::getErrors();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $seller = new Seller($_POST['seller']);

      $errors = $seller->validateData();

      if (empty($errors)) {
        $seller->save();
      }
    }

    $router->render('sellers/create', [
      'seller' => $seller,
      'errors' => $errors,
    ]);
  }
}
