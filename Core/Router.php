<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  protected $routes = [];
  public static $title;

  public function addRoute($uri, $controller, $method)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];
    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->addRoute($uri, $controller, 'GET');
  }
  public function post($uri, $controller)
  {
    return $this->addRoute($uri, $controller, 'POST');
  }

  public function only($type)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $type;
  }

  public function router($uri, $method)
  {
    self::$title = $uri === '/' ? 'HOME' : strtoupper(str_replace('/', ' ', $uri));

    foreach ($this->routes as $route) {
      if ($uri === $route['uri'] && $method === $route['method']) {

        Middleware::resolve($route['middleware']);

        return require BASE_DIR . $route['controller'];
      }
    }
    return abort(); //abort function will show an error page when unknown page visited
  }
}
