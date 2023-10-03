<?php

use Core\AuthUserData;
use Core\LoginForm;
use Core\Session;

$email = $_POST['user_mail'];
$password = $_POST['user_pass'];

Session::store('email',$email);

$form = new LoginForm;
$form->authenticate($email,$password);

if(!$form->authenticate($email,$password)) {
  redirectTo('/login');
}

//THIS CLASS STORES AUTHENTICATED USER DATA
// USER WHO IS LOGGED IN CURRENTLY;
$store_user_data =new AuthUserData($email);



redirectTo('/');
