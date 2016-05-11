<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 11/05/2016
 * Time: 10:53
 */

namespace Store\Classes\Util\Cookie;


class CookieManager
{
    private static $time;

    public function __construct()
    {
        self::$time = time() + 60*3;
    }
    public static function create($name, $value)
    {
        setcookie($name, $value, self::$time);
    }

    public static function remove($name)
    {
        if (self::checkIfExists($name)){
            unset($_COOKIE[$name]);
        }
    }

    public static function checkIfExists($name)
    {
        return isset($_COOKIE[$name]);
    }
}