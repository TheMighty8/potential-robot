<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 04/05/2016
 * Time: 08:57
 */

namespace Store\Classes\HtmlBuilders;


use Store\Interfaces\IHtmlBuilder;

class HtmlBuilder implements IHtmlBuilder
{
    private $head;
    private $navbar;
    private $body;
    private $footer;
    private $pageHtml = "";
    private $bodyContent = [];

    public function __construct(array $bodyContent)
    {
        $this->build($bodyContent);
    }

    private function build($bodyContent)
    {
        $this->head = new HeaderBuilder();
        $this->navbar = new NavbarBuilder();
        $this->body = new HtmlBodyBuilder();
        $this->footer = new FooterBuilder();
        $this->bodyContent = $bodyContent;

        $this->body->insertInBody($this->navbar->getAsHtml());

        foreach ($this->bodyContent as $item) {
            $this->body->insertInBody($item);
        }

        $this->body->insertInBody($this->footer->getAsHtml());


        $this->appendToHtml($this->head->getAsHtml());
        $this->appendToHtml($this->body->getAsHtml());
    }

    private function appendToHtml($content)
    {
        $this->pageHtml .= $content;
    }

    public function getAsHtml()
    {
        return $this->pageHtml;
    }
}