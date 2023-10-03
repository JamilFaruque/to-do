<?php

namespace Core;

class LoginForm
{
  public static $user;
  public function authenticate($email, $password)
  {
    static::$user = (App::resolve('database'))->query(
      'SELECT * FROM users WHERE email = :email',
      [
        'email' => $email
      ]
    )->fetch();

    if (!static::$user) {
      Session::flash('email','email not registered');
      return false;
    }
    if(!password_verify($password,static::$user['password'])) {
      Session::flash('password','password not matched!');
      return false;
    }

    return true;
  }

}
