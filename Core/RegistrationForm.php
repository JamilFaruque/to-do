<?php

namespace Core;

use Core\Validator;

class RegistrationForm
{
  public function authenticate($email, $password)
  {
    $user = (App::resolve('database'))->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

    if ($user) {
      Session::flash('email', 'Email already registered');
      return false;
    }
    if (!Validator::email($email)) {
      Session::flash('email', 'email is not valid lol');
      return false;
    }

    if (!Validator::string($password, 8, 255)) {
      Session::flash('password', 'password requires at least 8 characters');
      return false;
    }

    return true;
  }
}
