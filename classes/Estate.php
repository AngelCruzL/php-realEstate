<?php

namespace App;

class Estate
{
  protected static $db;

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

  public function saveDB()
  {
    $createQuery = "INSERT INTO estates(
      title,
      price,
      image,
      description,
      bedrooms,
      bathrooms,
      park,
      created_at,
      seller_id
    ) VALUES (
      '$this->title',
      '$this->price',
      '$this->imageName',
      '$this->description',
      '$this->bedrooms',
      '$this->bathrooms',
      '$this->park',
      '$this->created_at',
      '$this->seller_id'
    );";

    $result =  self::$db->query($createQuery);

    debug($result);
  }

  public static function setDB($database)
  {
    self::$db = $database;
  }
}
