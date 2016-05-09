<?php namespace Store\Classes\Database;

use Store\Classes\Model\User;
use Store\Classes\Util\ObjectFactoryService;

class UserDAO
{
    private $connection;

    function __construct()
    {
        $this->connection = ObjectFactoryService::getDb();
    }

    function findUser($email, $password)
    {
        $user = new User($this->connection, $email, $password);

        $query = "SELECT email FROM usuarios WHERE email='{$user->getEmail()}' AND senha='{$user->getPassword()}' LIMIT 1";

        $result = mysqli_query($this->connection, $query);

        return mysqli_fetch_assoc($result);
    }
}