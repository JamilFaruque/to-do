<?php

namespace Core;

class AuthUserData
{
  protected $user;

  public function __construct($email)
  {
    $this->user = (App::resolve('database'))->query(
      'SELECT * FROM users WHERE email = :email',
      [
        'email' => $email
      ]
    )->fetch();

    Session::store('user', strtoupper($this->user['name']));
    Session::store('user_id', $this->user['id']);
  }
}
