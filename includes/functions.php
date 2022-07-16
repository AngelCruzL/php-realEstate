<?php

define('TEMPLATES_URL', __DIR__ . './templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');
define('IMAGES_DIRECTORY', __DIR__ . '/../images/');

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

/* A function that is used to sanitize the html code. */
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
