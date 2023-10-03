<?php

use Core\App;
use Core\Session;

if (!Session::getData('user_id') === intval($_POST['user-id'])) {
  abort(403);
}

(App::resolve('database'))->query(
  'DELETE FROM tasks where id = :id', ['id' => $_POST['task-id']]
);

redirectTo('/');
