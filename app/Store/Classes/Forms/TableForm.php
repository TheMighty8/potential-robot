<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 05/05/2016
 * Time: 11:24
 */

namespace Store\Classes\Forms;


use Store\Classes\Inputs\ButtonTableInput;
use Store\Classes\Inputs\HiddenInput;
use Store\Interfaces\IForm;
use Store\Interfaces\IHtmlBuilder;

class TableForm extends FormBase implements IHtmlBuilder, IForm
{

    private $removeButton;
    private $idHiddenInput;

    public function __construct($action, $method, $productId, $inputName, $inputClass)
    {
        $this->action = $action;
        $this->method = $method;

        $this->idHiddenInput = new HiddenInput($productId);
        $this->removeButton = new ButtonTableInput("submit", $inputName, $inputClass, ucfirst($inputName));
    }

    public function getAsHtml()
    {
        $formAsHtml =
            "<form action='{$this->action}' method='{$this->method}'>" .
                "\n\t\t\t\t". $this->idHiddenInput->getAsHtml().
                "\n\t\t\t\t". $this->removeButton->getAsHtml().
            "\t\t\t</form>";

        return $formAsHtml;
    }

    public function sendForm(array $information)
    {
        // TODO: Implement sendForm() method.
    }
}