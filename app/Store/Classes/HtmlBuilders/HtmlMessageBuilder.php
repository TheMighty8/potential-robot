<?php namespace Store\Classes\HtmlBuilders;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 27/04/2016
 * Time: 11:13
 */
class HtmlMessageBuilder
{
    public static function ShowMessage($message, $type)
    {
        return "\t<h2 class='alert alert-{$type}'>{$message}<h2> \n";
    }
}

