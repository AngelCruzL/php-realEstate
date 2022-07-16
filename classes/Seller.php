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
}
