<?php namespace Store\Classes\Model;

use mysqli;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 12/04/2016
 * Time: 10:10
 */
class User
{
    private $email;
    private $password;
    
    function __construct(mysqli $connection = null, $email = null, $password = null)
    {
        $this
            ->setEmail(mysqli_real_escape_string($connection, $email))
            ->setPassword(mysqli_real_escape_string($connection, $password));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
        return $this;
    }
}