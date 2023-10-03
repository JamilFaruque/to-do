<?php

namespace Core\Middleware;


class Guest
{
  public function handle(){
    if(isset($_SESSION['_flash']['store']['user'])){
      return redirectTo('/');
    }
    return;
  }
}
