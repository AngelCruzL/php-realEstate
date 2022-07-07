<?php

define('TEMPLATES_URL', __DIR__ . './templates');
define('FUNCTIONS_URL', __DIR__ . './functions.php');

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
