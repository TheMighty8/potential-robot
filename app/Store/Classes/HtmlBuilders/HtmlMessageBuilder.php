<?php namespace Store\Classes\HtmlBuilders;
use Store\Interfaces\IHtmlBuilder;

/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 27/04/2016
 * Time: 11:13
 */
class HtmlMessageBuilder implements IHtmlBuilder
{
    private $message;

    public function BuildMessage($message, $type)
    {
        $this->message = "\t<h2 class='text-center center alert alert-{$type}'>{$message}<h2> \n";
    }

    public function getAsHtml()
    {
        return $this->message;
    }
}

