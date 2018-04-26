<?php

declare (strict_types = 1);

namespace MVC\Model;

use MVC\Model\Database;
use PDO;

class Validation
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    //check if username is used
    public function usernameValidation($username)
    {
        $sth = $this->connection->prepare('SELECT username FROM members WHERE username = ?');
        $sth->execute([$username]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
       
        return $result;
    }

    //check if email is used
    public function emailValidation($email)
    {
        $sth = $this->connection->prepare('SELECT email FROM members WHERE email = ?');
        $sth->execute([$email]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //confirm passwords are equal
    public function passwordValidation($password_1, $password_2)
    {
        if($password_1 == $password_2) {
            return true;
        } else {
            return false;
        }
    }
}