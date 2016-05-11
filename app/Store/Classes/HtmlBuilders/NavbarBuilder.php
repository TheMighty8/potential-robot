<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 04/05/2016
 * Time: 09:07
 */

namespace Store\Classes\HtmlBuilders;

use Store\Classes\Util\Session\SessionManager;
use Store\Config\Config;
use Store\Interfaces\IHtmlBuilder;

class NavbarBuilder implements IHtmlBuilder
{
    private $navbarHtml = "";

    public function getAsHtml()
    {
        $this->appendContentToNavbar();

        return $this->navbarHtml;
    }

    private function appendContentToNavbar()
    {
        $this->appendToNavbar("<div class='navbar navbar-inverse navbar-fixed-top'> \n");
        $this->appendToNavbar("\t <div class='container'> \n");
        $this->appendToNavbar("\t \t <div class='navbar-header'> \n");
        $this->appendToNavbar("\t \t \t <a class='navbar-brand' href=''> Placeholder </a> \n");
        $this->appendToNavbar("\t \t </div> \n");

        $this->appendToNavbar("\t \t <div> \n");
        $this->appendToNavbar("\t \t \t<ul class='nav navbar-nav'> \n");
        $this->appendPagesToNavbar();
        $this->appendToNavbar("\t \t \t</ul> \n");
        if (SessionManager::get('user') != null){
            $this->appendSideMenuItensToNavbar();
        }
        $this->appendToNavbar("\t \t </div> \n");
        $this->appendToNavbar("\t </div> \n");
        $this->appendToNavbar("</div> \n");
    }

    private function appendToNavbar($contentToAppend)
    {
        $this->navbarHtml .= $contentToAppend;
    }

    private function appendPagesToNavbar()
    {
        $pagesFromConfigFile[] = Config::getSystemPagesArrayAsNameUrl();

        foreach ($pagesFromConfigFile as $currenPageInformation) {
            foreach ($currenPageInformation as $name => $url) {
                $html = "\t \t \t \t<li> <a href='{$url}'>{$name}</a> </li> \n";
                $this->appendToNavbar($html);
            }
        }
    }

    private function appendSideMenuItensToNavbar()
    {
        $logoutPageUrl = Config::getProjectRootUrl() . 'Layout' . '/logout' . '.php';
        $this->appendToNavbar("\t \t \t<ul class='nav navbar-nav navbar-right'> \n");
        $this->appendToNavbar("\t\t\t\t<li> <a href='{$logoutPageUrl}'><span class=\"glyphicon glyphicon-log-out\"></span> Logout </a> </li>\n");
        $this->appendToNavbar("\t \t \t</ul> \n");
    }
}