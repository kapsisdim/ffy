<?php

declare  (strict_types = 1);

namespace MVC\Model;

use MVC\Model\Database;
use PDO;

class Authetication
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function autheticationAction($username, $password)
    {
        $sth = $this->connection->prepare('SELECT username FROM members WHERE username = ? AND password = ?');
        $sth->execute([$username, $password]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
}