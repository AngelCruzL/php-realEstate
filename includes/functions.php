<?php

define('TEMPLATES_URL', __DIR__ . './templates');
define('FUNCTIONS_URL', __DIR__ . './functions.php');

function includeTemplate(string $name, bool $isIndex = false): void
{
  include TEMPLATES_URL . "/${name}.php";
}

function isAuthenticated(): bool
{
  session_start();
  return isset($_SESSION['logged']);
}
