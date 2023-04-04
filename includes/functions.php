<?php

define('TEMPLATES_URL', __DIR__ . './templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');
define('IMAGES_DIRECTORY', $_SERVER['DOCUMENT_ROOT'] . '/public/images/');


function includeTemplate(string $name, bool $isIndex = false): void
{
  include TEMPLATES_URL . "/${name}.php";
}

function isAuthenticated()
{
  session_start();
  if (!$_SESSION['logged']) header('Location: /bienes-raices');
}

function debug($variableToDebug)
{
  echo "<pre>";
  var_dump($variableToDebug);
  echo "</pre>";

  exit;
}

/**
 * A function that is used to sanitize the html code.
 *
 * @param html The HTML to be escaped.
 *
 * @return string the htmlspecialchars() function.
 */
function s($html): string
{
  return htmlspecialchars($html, ENT_QUOTES, 'UTF-8');
}

/**
 * If the content type is in the array of types allowed to delete, return true, otherwise return false
 *
 * @param contentType The type of content you want to retrieve.
 *
 * @return a boolean value.
 */
function validateContentType($contentType)
{
  $types = ['estate', 'seller'];

  return in_array($contentType, $types);
}

/**
 * It returns a message based on the status code
 *
 * @param statusCode 1 =&gt; created, 2 =&gt; updated, 3 =&gt; deleted
 *
 * @return the value of the message.
 */
function showNotification($statusCode)
{
  $message = '';

  switch ($statusCode) {
    case 1:
      $message = 'Registro creado correctamente';
      break;

    case 2:
      $message = 'Registro actualizado correctamente';
      break;

    case 3:
      $message = 'Registro eliminado correctamente';
      break;

    default:
      $message = false;
      break;
  }

  return $message;
}

/**
 * If the id is not valid, redirect to the given url
 *
 * @param string url The URL to redirect to if the ID is invalid.
 *
 * @return The return value of the function is the return value of the last statement in the function.
 */
function validateIdOrRedirect(string $url)
{
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if (!$id) header("Location: ${url}");

  return $id;
}
