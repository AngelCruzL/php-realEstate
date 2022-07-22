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
    $message = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $contactFormData = $_POST['contact'];

      $email = new PHPMailer();
      $email->isSMTP();
      $email->Host = $_ENV['EMAIL_HOST'];
      $email->SMTPAuth = $_ENV['EMAIL_SMTPAUTH'];
      $email->Port = $_ENV['EMAIL_PORT'];
      $email->Username = $_ENV['EMAIL_USERNAME'];
      $email->Password = $_ENV['EMAIL_PASSWORD'];

      $email->setFrom($_ENV['EMAIL_FROM_ADDRESS']);
      $email->addAddress('admin@bienesraices.com', 'bienesraices.com');
      $email->Subject = 'Contacto desde bienesraices.com';
      $email->isHTML(true);
      $email->CharSet = 'UTF-8';

      $emailContent = '<html>
        <h1>Contacto desde bienesraices.com</h1>
        <p>Nombre: ' . $contactFormData['name'] . '</p>
        <p>Mensaje: ' . $contactFormData['message'] . '</p>
        <p>Vende o compra: ' . $contactFormData['options'] . '</p>
        <p>Presupuesto: ' . $contactFormData['budget'] . '</p>';

      if ($contactFormData['contact'] === 'phone') {
        $emailContent .= '<p>El usuario eligió contactar por teléfono</p>
          <p>Teléfono: ' . $contactFormData['phoneNumber'] . '</p>
          <p>Fecha de contacto: ' . $contactFormData['date'] . '</p>
          <p>Hora de contacto: ' . $contactFormData['hour'] . '</p>
          </html>';
      } else {
        $emailContent .= '<p>El usuario eligió contactar por correo</p>
          <p>Email: ' . $contactFormData['email'] . '</p>
          </html>';
      }

      $email->Body = $emailContent;

      if ($email->send()) {
        $message = 'Mensaje enviado correctamente';
      } else {
        $message = 'Error al enviar el mensaje';
      }
    }

    $router->render('pages/contact', [
      'message' => $message,
    ]);
  }
}
