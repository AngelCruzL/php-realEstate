<?php

namespace App;

class Estate extends ActiveRecord
{
  protected static $table = 'estates';
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
    $this->id = $args['id'] ?? null;
    $this->title = $args['title'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->image = $args['image'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->bedrooms = $args['bedrooms'] ?? '';
    $this->bathrooms = $args['bathrooms'] ?? '';
    $this->park = $args['park'] ?? '';
    $this->created_at = date('Y/m/d');
    $this->seller_id = $args['seller_id'] ?? '';
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
    if (empty($this->seller_id)) self::$errors[] = 'El vendedor es obligatorio';

    return self::$errors;
  }
}
