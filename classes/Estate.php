<?php

namespace App;

class Estate
{
  protected static $db;
  protected static $dbColumns = [
    'id',
    'title',
    'price',
    'image',
    'description',
    'bedrooms',
    'bathrooms',
    'park',
    'created_at',
    'seller_id'
  ];
  protected static $errors = [];

  public $id;
  public $title;
  public $price;
  public $image;
  public $description;
  public $bedrooms;
  public $bathrooms;
  public $park;
  public $created_at;
  public $seller_id;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? '';
    $this->title = $args['title'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->image = $args['image'] ?? 'image.jpg';
    $this->description = $args['description'] ?? '';
    $this->bedrooms = $args['bedrooms'] ?? '';
    $this->bathrooms = $args['bathrooms'] ?? '';
    $this->park = $args['park'] ?? '';
    $this->created_at = date('Y/m/d');
    $this->seller_id = $args['seller_id'] ?? '';
  }

  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function saveDB()
  {
    $sanitizedData = $this->sanitizeData();

    $createQuery = "INSERT INTO estates( " .
      join(', ', array_keys($sanitizedData)) .
      " ) VALUES ( '" .
      join("', '", array_values($sanitizedData)) .
      "' );";

    $result =  self::$db->query($createQuery);

    debug($result);
  }

  public function mapData()
  {
    $data = [];

    foreach (self::$dbColumns as $column) {
      if ($column === 'id') continue;
      $data[$column] = $this->$column;
    }

    return $data;
  }

  public function sanitizeData()
  {
    $data = $this->mapData();
    $sanitizedData = [];

    foreach ($data as $key => $value) {
      $sanitizedData[$key] = self::$db->escape_string($value);
    }

    return $sanitizedData;
  }

  public static function getErrors()
  {
    return self::$errors;
  }

  public function validateData()
  {
    if (empty($this->title)) self::$errors[] = 'El título es obligatorio';
    if (empty($this->price)) self::$errors[] = 'El precio es obligatorio';
    if (strlen($this->description) < 50) self::$errors[] = 'La descripción debe tener al menos 50 caracteres';
    if (empty($this->bedrooms)) self::$errors[] = 'El número de habitaciones es obligatorio';
    if (empty($this->bathrooms)) self::$errors[] = 'El número de baños es obligatorio';
    if (empty($this->park)) self::$errors[] = 'El número de lugares de estacionamiento es obligatorio';
    if (empty($this->seller_id)) self::$errors[] = 'El vendedor es obligatorio';

    return self::$errors;
  }
}
