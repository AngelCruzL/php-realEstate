<?php

function dbConnection(): mysqli
{
  $db = new mysqli("localhost", "root", "root", "bienes_raices");

  if (!$db) {
    echo "Conexión fallida";
    exit;
  }

  return $db;
}
