<?php

use Core\App;
use Core\Session;
use Core\Validator;

$body = $_POST['task-body'];


if (!Validator::string(trim($body))) {
  Session::flash('body', 'Task should contain at least a character');
  redirectTo('/task/add');
}


(App::resolve('database'))->query(
  'INSERT INTO tasks(body,user_id,timeStamp,epoch_time) VALUES(:body,:user_id,:timeStamp,:epoch_time)',
  [
    'body' => htmlspecialchars($body),
    'user_id' => Session::getData('user_id'),
    'timeStamp' => date('h:ia d/m/y'),
    'epoch_time' => time()
  ]
);

redirectTo('/');
