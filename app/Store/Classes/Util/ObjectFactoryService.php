<?php namespace Store\Classes\Util;
use mysqli;
use Store\Classes\Util\Session\SecureSessionHandler;
use Store\Config\config;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 22/04/2016
 * Time: 08:31
 */
final class ObjectFactoryService
{
    private static $session;
    private static $mysqli;
    private static $config;

    public static function getSession() 
    {
        if (self::$session == null) {
            $session = new SecureSessionHandler();
            $session->start();
            if (!$session->isValid(9000)){
                $session->forget();
            }
            self::$session = &$session;
        }

        return self::$session;
    }

    public static function getDb()
    {
        if (self::$mysqli == null) {
            try {
                $connectionParams = self::getConfig()['database'];
                self::$mysqli = new mysqli
                (
                    $connectionParams['address'],
                    $connectionParams['username'],
                    $connectionParams['password'],
                    $connectionParams['dbName']
                );

                if (mysqli_connect_error()) {
                    throw new mysqli_sql_exception;
                }
            } catch (mysqli_sql_exception $e) {
                echo "Failed to connect" . $e->getMessage();
            }
        }
        return self::$mysqli;
    }

    public static function getConfig()
    {
        if (!self::$config) {
            self::$config = Config::databaseConf();
        }

        return self::$config;
    }
}