<?php

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  die();
}

function abort($code = 404)
{
  require BASE_DIR . "/controllers/{$code}.php";
  exit();
}

function redirectTo($path) {
  header("location: {$path}");
  exit();
}
