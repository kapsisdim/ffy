<?php

namespace MVC\Model;

use MVC\Model\Database;

class MemberRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function updateMemberPassword($password, $username)
    {
        $sth = $this->connection->prepare('UPDATE members SET password =? WHERE username =?');
        $sth->execute([$password, $username]);
    }

    public function createMember($username, $email, $password)
    {
        $sth =  $this->connection->prepare('INSERT INTO members(username, email, password) VALUES (?, ?, ?)');
        $sth->execute([$username, $email, $password]);
    }

}