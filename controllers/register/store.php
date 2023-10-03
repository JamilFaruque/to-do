<?php

use Core\App;
use Core\AuthUserData;
use Core\RegistrationForm;
use Core\Session;

$name = $_POST['user_name'];
$email = $_POST['user_mail'];
$password = $_POST['user_pass'];

Session::store('name', $name);
Session::store('email', $email);

$form = new RegistrationForm;

if (!$form->authenticate($email, $password)) {
  redirectTo('/register');
}

$db = App::resolve('database');

$db->query(
  'INSERT INTO users(name,email,password) VALUES(:name,:email,:password)',
  [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
  ]
);


new AuthUserData($email);
redirectTo('/');
