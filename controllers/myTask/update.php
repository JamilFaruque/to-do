<?php

use Core\App;
use Core\Session;
use Core\Validator;

if (!Validator::string(trim($_POST['task-body']))) {
  Session::flash('body', 'Task should contain at least a character');
  redirectTo('/task/edit');
}

(App::resolve('database'))->query(
  'UPDATE tasks SET body = :body,timeStamp = :timeStamp,epoch_time=:epoch_time WHERE id = :id',
  [
    'body' => htmlspecialchars($_POST['task-body']),
    'id' => $_GET['id'],
    'timeStamp' => date('h:ia d/m/y'),
    'epoch_time' => time()
  ]
);

redirectTo('/');