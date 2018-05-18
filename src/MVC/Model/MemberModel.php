<?php

declare (strict_types = 1);

namespace MVC\Model;

class MemberModel
{
    private $username;

    private $emails;

    private $password;    

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->username;
    }
}