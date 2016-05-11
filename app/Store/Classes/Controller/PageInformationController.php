<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 11/05/2016
 * Time: 10:42
 */

namespace Store\Classes\Controller;

use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlBuilders\HtmlMessageBuilder;

class PageInformationController
{
    private static $message;
    private static $messageType;

    public static function setInformationMessage($message)
    {
        self::$message = $message;
    }

    public static function setInformationMessageType($type)
    {
        self::$messageType = $type;
    }

    public static function getInformationMessage()
    {
        $informationMessage = new HtmlMessageBuilder();

        $informationMessage->BuildMessage(self::$message, self::$messageType);

        $informationMessage = $informationMessage->getAsHtml();

        $messagePage = new HtmlBuilder([$informationMessage]);
        
        return $messagePage;
    }

    
}