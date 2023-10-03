<?php

namespace Core;

class App
{
  public static function resolve($val)
  {
    $config = require 'config.php';
    return new Database($config[$val]);
  }
}
