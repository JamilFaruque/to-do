<?php


namespace Core\Middleware;

class Middleware
{
  const Guest = Guest::class;
  const Auth = Auth::class;

  public static function resolve($middleware)
  {
    if(!isset($middleware)){
      return;
    }

    $className = ucfirst($middleware);
    $class = constant('self::' . $className);

    return (new $class)->handle();
  }
}
