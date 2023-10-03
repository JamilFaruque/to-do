<?php

namespace Core;

class Session
{
  public static function flash($type, $message)
  {
    return $_SESSION['_flash']['error'][$type] = $message;
  }
  public static function store($type, $message)
  {
    return $_SESSION['_flash']['store'][$type] = $message;
  }
  public static function getData($data)
  {
    if (isset($_SESSION['_flash']['store'][$data])) {
      return $_SESSION['_flash']['store'][$data];
    }
    return;
  }
  public static function getError($data)
  {
    if (isset($_SESSION['_flash']['error'][$data])) {
    return $_SESSION['_flash']['error'][$data];
    }
    return;
  }

  public static function unflash()
  {
    unset($_SESSION['_flash']['error']);
  }
}
