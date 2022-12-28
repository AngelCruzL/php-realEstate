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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

  public static function update(Router $router)
  {
    $id = validateIdOrRedirect('/admin');

    $seller = Seller::find($id);
    $errors = Seller::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['seller'];

      $seller->sync($args);
      $errors = $seller->validateData();

      if (empty($errors)) {
        $seller->save();
      }
    }

    $router->render('sellers/update', [
      'seller' => $seller,
      'errors' => $errors,
    ]);
  }

  public static function delete()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if ($id) {
        $content_type = $_POST['type'];

        if (validateContentType($content_type)) {
          if ($content_type === 'seller') {
            $seller = Seller::find($id);
            $seller->delete();
          }
        }
      }
    }
  }
}
