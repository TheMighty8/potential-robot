<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 04/05/2016
 * Time: 08:35
 */

namespace Store\Classes\HtmlBuilders;

use Store\Config\Config;
use Store\Interfaces\IHtmlBuilder;

class HeaderBuilder implements IHtmlBuilder
{
    private $websiteTitle;
    private $bootstrapCssPath;
    private $customCssPath;

    public function __construct()
    {
        $this->websiteTitle = Config::getProjectSiteName();
        $this->bootstrapCssPath = Config::getProjectRootUrl() . 'Layout/css/bootstrap.css';
        $this->customCssPath = Config::getProjectRootUrl() . 'Layout/css/loja.css';
    }

    public function getAsHtml()
    {
        $headerAsHtml =
            "<!DOCTYPE html> \n"
            . "<head> \n"
            ."\t" . "<meta charset='utf-8'> \n"
            ."\t" . "<title> {$this->websiteTitle} </title> \n"
            ."\t" . "<link rel='stylesheet' href='$this->bootstrapCssPath'> \n"
            ."\t" . "<link rel='stylesheet' href='$this->customCssPath'> \n" .
            "</head> \n";

        return $headerAsHtml;
    }
}