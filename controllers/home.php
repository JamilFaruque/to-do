<?php

use Core\App;
use Core\Session;

if (isset($_SESSION['_flash']['store']['user'])) {
  $db = App::resolve('database');
  $user_tasks = $db->query(
    'SELECT * FROM tasks WHERE user_id = :user_id',
    [
      'user_id' => Session::getData('user_id')
    ]
  )->fetchAll();

  if (!$user_tasks) {
    Session::store('empty', 'YOU HAVE NOT CREATED ANY TASK YET');
  }

  //this is sorting function
  function date_compare($element1, $element2)
  {
    $time1 = $element1['epoch_time'];
    $time2 = $element2['epoch_time'];

    return $time2 - $time1;
  }
  // implementation of sorting

  usort($user_tasks, "date_compare");

  $tasks = $user_tasks;

  
}

require BASE_DIR . 'views/home.view.php';
