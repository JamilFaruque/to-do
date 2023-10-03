<?php


$myRouter->get('/','controllers/home.php');
$myRouter->get('/about','controllers/about.php');

// TASK MANAGER 
$myRouter->post('/','controllers/myTask/delete.php');

$myRouter->get('/task/add','controllers/myTask/addTask.php')->only('auth');
$myRouter->post('/task/add','controllers/myTask/store.php')->only('auth');

$myRouter->get('/task/edit','controllers/myTask/edit.php')->only('auth');
$myRouter->post('/task/edit','controllers/myTask/update.php')->only('auth');

//REGISTRATION
$myRouter->get('/register','controllers/register/register.php')->only('guest');
$myRouter->post('/register','controllers/register/store.php');

//LOGIN
$myRouter->get('/login','controllers/login/login.php')->only('guest');
$myRouter->post('/login','controllers/login/store.php');

//LOG OUT
$myRouter->get('/logout','controllers/logout/logout.php');






