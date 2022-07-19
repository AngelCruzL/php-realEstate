<?php

namespace Model;

class Admin extends ActiveRecord
{
  protected static $table = 'users';
  protected static $dbColumns = ['id', 'email', 'password'];

  public $id;
  public $email;
  public $password;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
  }

  public function validateData()
  {
    if (empty($this->email)) self::$errors[] = 'El correo es obligatorio o no es válido';
    if (empty($this->password)) self::$errors[] = 'La contraseña es obligatoria';

    return self::$errors;
  }
}
