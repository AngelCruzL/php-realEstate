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

  public function userExists()
  {
    $query = "SELECT * FROM " . self::$table . " WHERE email = '$this->email' LIMIT 1;";
    $result = self::$db->query($query);

    if (!$result->num_rows) {
      self::$errors[] = 'El usuario no existe';
      return;
    }

    return $result;
  }

  public function checkPassword($result)
  {
    $user = $result->fetch_object();
    $isAuth = password_verify($this->password, $user->password);

    if (!$isAuth) self::$errors[] = 'La contraseña no es correcta';

    return $isAuth;
  }

  public function login()
  {
    session_start();

    $_SESSION['user'] = $this->email;
    $_SESSION['logged'] = true;

    header('Location: /admin');
  }
}
