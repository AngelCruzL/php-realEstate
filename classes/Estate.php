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
    $this->image = $args['image'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->bedrooms = $args['bedrooms'] ?? '';
    $this->bathrooms = $args['bathrooms'] ?? '';
    $this->park = $args['park'] ?? '';
    $this->created_at = date('Y/m/d');
    $this->seller_id = $args['seller_id'] ?? '1';
  }

  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function saveDB()
  {
    if (isset($this->id)) {
      $this->updateEstate();
    } else {
      $this->createEstate();
    }
  }

  private function createEstate()
  {
    $sanitizedData = $this->sanitizeData();

    $query = "INSERT INTO estates( " .
      join(', ', array_keys($sanitizedData)) .
      " ) VALUES ( '" .
      join("', '", array_values($sanitizedData)) .
      "' );";

    $result = self::$db->query($query);

    return $result;
  }

  private function updateEstate()
  {
    $sanitizedData = $this->sanitizeData();

    $values = [];
    foreach ($sanitizedData as $key => $value) {
      $values[] = "{$key}='{$value}'";
    }

    $query = "UPDATE estates SET " .
      join(', ', $values) .
      " WHERE id = " . self::$db->escape_string($this->id) .
      " LIMIT 1;";

    $result = self::$db->query($query);

    if ($result) header('Location: /bienes-raices/admin?status=2');
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

  public function setImage($image)
  {
    if (isset($this->id)) {
      $fileExistes = file_exists(IMAGES_DIRECTORY . $this->image);

      if ($fileExistes) unlink(IMAGES_DIRECTORY . $this->image);
    }

    if ($image) $this->image = $image;
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
    if (empty($this->image)) self::$errors[] = 'La imagen es obligatoria';
    if (strlen($this->description) < 50) self::$errors[] = 'La descripción debe tener al menos 50 caracteres';
    if (empty($this->bedrooms)) self::$errors[] = 'El número de habitaciones es obligatorio';
    if (empty($this->bathrooms)) self::$errors[] = 'El número de baños es obligatorio';
    if (empty($this->park)) self::$errors[] = 'El número de lugares de estacionamiento es obligatorio';
    // if (empty($this->seller_id)) self::$errors[] = 'El vendedor es obligatorio';

    return self::$errors;
  }

  public static function getAllEstates()
  {
    $query = "SELECT * FROM estates";
    $result = self::sqlConsult($query);
    return $result;
  }

  public static function getEstateById($id)
  {
    $query = "SELECT * FROM estates WHERE id = ${id}";
    $result = self::sqlConsult($query);
    return array_shift($result);
  }

  public static function sqlConsult($query)
  {
    $result = self::$db->query($query);

    $array = [];
    while ($row = $result->fetch_assoc()) {
      $array[] = self::createObject($row);
    }

    $result->free();

    return $array;
  }

  protected static function createObject($register)
  {
    $object = new self;

    foreach ($register as $key => $value) {
      if (property_exists($object, $key)) {
        $object->$key = $value;
      }
    }

    return $object;
  }

  /**
   * It takes an array of key/value pairs and assigns the values to the object's properties
   *
   * @param args An array of key/value pairs to sync with the current object's properties.
   */
  public function sync($args = [])
  {
    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
