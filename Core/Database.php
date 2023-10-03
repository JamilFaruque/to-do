<?php

namespace Core;

use PDO;

class Database
{
  public $db;

  public function __construct($config, $user = 'root', $password = '')
  {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

    $this->db = new PDO($dsn, $user, $password,[
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $conditions = [])
  {
    $statement = $this->db->prepare($query);

    $statement->execute($conditions);

    return $statement;
  }
}
