<?php

namespace Core;

class Validator
{

  public static function string($data, $min = 1, $max = INF)
  {
    return strlen($data) >= $min && strlen($data) <= $max;
  }

  public static function email($mail)
  {
    return filter_var($mail,FILTER_VALIDATE_EMAIL);
  }
}
