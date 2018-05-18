<?php

declare (strict_types = 1);

namespace MVC\Model;

use MVC\Model\Database;
use PDO;

class Validation
{
    private $connection;

    private $validation;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    //check if username is used
    public function usernameValidation($username)
    {
        $this->validation = false;
        $username = trim($username, "\n\r\0\x0B\t.");
        $username = stripslashes($username);
        $username = htmlspecialchars($username);

        $sth = $this->connection->prepare('SELECT username FROM members WHERE username = ?');
        $sth->execute([$username]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
       
        if (empty($result)) {
            $this->validation = true;
        }

        return $this->validation;
    }

    //check if email is used
    public function emailValidation($email)
    {
        $this->validation = false;

        if (filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $sth = $this->connection->prepare('SELECT email FROM members WHERE email = ?');
            $sth->execute([$email]);
            $result = $sth->fetch(PDO::FETCH_ASSOC);

            if (empty($result)) {
                
                $this->validation = true;
            }
        }
        return $this->validation;
    }

    //confirm passwords are equal
    public function passwordValidation($password_1, $password_2)
    {
        $this->validation = false;
        
        if($password_1 == $password_2) {
            $this->validation = true;
        }

        return $this->validation;
    }
}