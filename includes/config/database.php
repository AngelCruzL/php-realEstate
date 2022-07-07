<?php

function dbConnection(): mysqli
{
  $db = mysqli_connect("localhost", "root", "root", "bienes_raices");

  if (!$db) {
    echo "Conexión fallida";
    exit;
  }

  return $db;
}
