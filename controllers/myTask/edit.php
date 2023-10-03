<?php

use Core\App;
use Core\Session;


if (isset($_GET['id'])) {

  $task = (App::resolve('database'))->query(
    'SELECT * FROM tasks where id = :id ',
    ['id' => $_GET['id']]
  )->fetch();

  if ($task['user_id'] != Session::getData('user_id')) {
    abort(403);
  }
}

require BASE_DIR . '/views/myTask/edit.view.php';
