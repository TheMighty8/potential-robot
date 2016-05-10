<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 10/05/2016
 * Time: 07:57
 */

namespace Store\Classes\Util\Session;


class SessionManager
{
    public static function insert($name, $value)
    {
        session_start();
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        session_start();
        return $_SESSION[$name];
    }

    public static function remove($name)
    {
        session_start();
        unset($_SESSION[$name]);
    }

    public static function forget()
    {
        session_start();
        session_destroy();
    }
}