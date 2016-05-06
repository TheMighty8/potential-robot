<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 04/05/2016
 * Time: 09:05
 */

namespace Store\Classes\HtmlBuilders;

use Store\Interfaces\IHtmlBuilder;

class HtmlBodyBuilder implements IHtmlBuilder
{
    private $bodyContent = [];
    private $bodyHtml = "";

    public function getAsHtml()
    {
        $this->appendToBody("<body> \n");
        $this->appendToBody("<div class='principal'> \n");
            $this->build();
        $this->appendToBody("</div> \n");
        $this->appendToBody("</body>");

        return $this->bodyHtml;
    }

    private function build()
    {
        foreach ($this->bodyContent as $contentBlock) {
            $this->appendToBody($contentBlock);
        }
    }

    private function appendToBody($whatToAppend)
    {
        $this->bodyHtml .= $whatToAppend;
    }

    public function insertInBody($htmlToInsert)
    {
        $content = "<div class='container'>\n" . $htmlToInsert . "</div>\n";
        $this->bodyContent[] = $content;
    }

}