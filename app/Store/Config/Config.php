<?php namespace Store\Config;
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 03/05/2016
 * Time: 09:20
 */
Class Config
{
    private static $projectRootUrl = "http://localhost/loja-alura/app/Store/";
    private static $projectSiteName = "Loja";
    private static $indexLocationStringUrl = "Location: " . "http://localhost/loja-alura";

    public static function getSystemPagesArrayAsNameUrl()
    {
        return
            [
                'Home' => 'http://localhost/loja-alura/index.php',
                'All Products' => self::$projectRootUrl . 'Layout' . '/all-products' . '.php',
                'Insert Product' => self::$projectRootUrl . 'Layout' . '/insert-product' . '.php',
                'Contact' => self::$projectRootUrl . 'Layout' . '/contact' . '.php'
            ];
    }

    public static function databaseConf()
    {
        return
            [
                "database" =>
                    [
                        "username" => "root",
                        "password" => "",
                        "address" => "localhost",
                        "port" => "",
                        "dbName" => "loja"
                    ],
            ];
    }

    public static function getProjectSiteName()
    {
        return self::$projectSiteName;
    }

    public static function getProjectRootUrl()
    {
        return self::$projectRootUrl;
    }

    public static function getIndexLocationStringUrl()
    {
        return self::$indexLocationStringUrl;
    }
}