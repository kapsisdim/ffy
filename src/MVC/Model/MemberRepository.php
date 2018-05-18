<?php

namespace MVC\Model;

use MVC\Model\Database;
use PDO;

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

    public function getMember($username) 
    {
        $sth = $this->connection->prepare('SELECT username, email, password FROM members WHERE username = ?');
        $sth->execute([$username]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

}