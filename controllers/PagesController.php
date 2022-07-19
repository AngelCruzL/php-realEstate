<?php

namespace Controllers;

use MVC\Router;
use Model\Estate;
use PHPMailer\PHPMailer\PHPMailer;

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
      $email = new PHPMailer();
      $email->isSMTP();
      $email->Host = 'smtp.mailtrap.io';
      $email->SMTPAuth = true;
      $email->Port = 2525;
      $email->Username = '9c9c0dc21affa6';
      $email->Password = '9d1afd8104cbca';

      $email->setFrom('admin@bienesraices.com');
      $email->addAddress('admin@bienesraices.com', 'bienesraices.com');
      $email->Subject = 'Contacto desde bienesraices.com';
      $email->isHTML(true);
      $email->CharSet = 'UTF-8';

      $email->Body = '<h1>Contacto desde bienesraices.com</h1>
        <p>Nombre: ' . $_POST['name'] . '</p>
        <p>Email: ' . $_POST['email'] . '</p>
        <p>Mensaje: ' . $_POST['message'] . '</p>';
      if ($email->send()) {
        echo 'mensaje enviado';
      } else {
        echo 'error al enviar el mensaje';
      }
    }

    $router->render('pages/contact', []);
  }
}
