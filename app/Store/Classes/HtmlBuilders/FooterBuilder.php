<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 04/05/2016
 * Time: 08:35
 */

namespace Store\Classes\HtmlBuilders;

use Store\Interfaces\IHtmlBuilder;

class FooterBuilder implements IHtmlBuilder
{

    public function getAsHtml()
    {
        $footerAsHtml =
            "\t<footer class='footer'> \n"
                ."\t\t<p>Copyright &copy Batata Productions ". date("Y") . "</p> \n"
            ."\t</footer>\n";

        return $footerAsHtml;
    }
}