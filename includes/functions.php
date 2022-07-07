<?php
require 'app.php';

function includeTemplate(string $name, bool $isIndex = false): void
{
  include TEMPLATES_URL . "/${name}.php";
}

function isAuthenticated(): bool
{
  session_start();
  return isset($_SESSION['logged']);
}
