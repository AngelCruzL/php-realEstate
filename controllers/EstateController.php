<?php

namespace Controllers;

use MVC\Router;
use Model\Estate;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;

class EstateController
{
  public static function index(Router $router)
  {
    $estates = Estate::all();
    $status = $_GET['status'] ?? null;

    $router->render('estates/admin', [
      'estates' => $estates,
      'status' => $status,
    ]);
  }

  public static function create(Router $router)
  {
    $estate = new Estate;
    $sellers = Seller::all();
    $errors = Estate::getErrors();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $estate = new Estate($_POST['estate']);

      $imageName = md5(uniqid(rand(), true)) . '.jpg';

      if ($_FILES['estate']['tmp_name']['image']) {
        $image = Image::make($_FILES['estate']['tmp_name']['image'])->fit(800, 600);
        $estate->setImage($imageName);
      }

      $errors = $estate->validateData();

      if (empty($errors)) {
        if (!is_dir(IMAGES_DIRECTORY)) mkdir(IMAGES_DIRECTORY);
        $image->save(IMAGES_DIRECTORY . $imageName);

        $estate->save();
      }
    }

    $router->render('estates/create', [
      'estate' => $estate,
      'sellers' => $sellers,
      'errors' => $errors,
    ]);
  }

  public static function update(Router $router)
  {
    $id = validateIdOrRedirect('/admin');

    $estate = Estate::find($id);
    $sellers = Seller::all();
    $errors = Estate::getErrors();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $args = $_POST['estate'];

      $estate->sync($args);
      $errors = $estate->validateData();

      $imageName = md5(uniqid(rand(), true)) . '.jpg';

      if ($_FILES['estate']['tmp_name']['image']) {
        $image = Image::make($_FILES['estate']['tmp_name']['image'])->fit(800, 600);
        $estate->setImage($imageName);
      }

      if (empty($errors)) {
        if ($_FILES['estate']['tmp_name']['image']) {
          $image->save(IMAGES_DIRECTORY . $imageName);
        }

        $estate->save();
      }
    }

    $router->render('estates/update', [
      'estate' => $estate,
      'sellers' => $sellers,
      'errors' => $errors,
    ]);
  }
}
