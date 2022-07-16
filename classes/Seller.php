<?php

namespace App;

class Seller extends ActiveRecord
{
  protected static $table = 'sellers';
  protected static $dbColumns = [
    'id',
    'firstname',
    'lastname',
    'phone'
  ];

  public $id;
  public $firstname;
  public $lastname;
  public $phone;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->firstname = $args['firstname'] ?? '';
    $this->lastname = $args['lastname'] ?? '';
    $this->phone = $args['phone'] ?? '';
  }

  public function validateData()
  {
    if (empty($this->firstname)) self::$errors[] = 'El nombre es obligatorio';
    if (empty($this->lastname)) self::$errors[] = 'El apellido es obligatorio';
    if (empty($this->phone)) self::$errors[] = 'El número de teléfono es obligatorio';
    if (!preg_match('/[0-9]{10}/', $this->phone)) self::$errors[] = 'El número de teléfono no es válido';

    return self::$errors;
  }
}
