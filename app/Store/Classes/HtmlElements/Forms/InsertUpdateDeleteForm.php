<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 09:22
 */

namespace Store\Classes\HtmlElements\Forms;

use Store\Classes\HtmlElements\Inputs\ButtonInput;
use Store\Classes\HtmlElements\Inputs\CheckboxInput;
use Store\Classes\HtmlElements\Inputs\DefaultInput;
use Store\Classes\HtmlElements\Inputs\HiddenInput;
use Store\Classes\HtmlElements\Inputs\SelectInput;
use Store\Classes\HtmlElements\Inputs\TextAreaInput;
use Store\Interfaces\IHtmlBuilder;

class InsertUpdateDeleteForm extends FormBase implements IHtmlBuilder
{
    private $hiddenIdInput;
    private $nameInput;
    private $priceInput;
    private $descriptionInput;
    private $conditionInput;
    private $categoryInput;
    private $submitButtonInput;


    public function __construct($action, $method, $checkboxDefaultCondition, $productId = '')
    {
        $this->action = $action;
        $this->method = $method;
        $this->hiddenIdInput = new HiddenInput($productId);
        $this->nameInput = new DefaultInput('text', 'name', 'form-control');
        $this->priceInput = new DefaultInput('number', 'price', 'form-control');
        $this->descriptionInput = new TextAreaInput('description', 'form-control');
        $this->conditionInput = new CheckboxInput('checkbox', 'pre-owned', '', $checkboxDefaultCondition);
        $this->categoryInput = new SelectInput('select', 'select');
        $this->submitButtonInput = new ButtonInput('submit', 'create', 'btn btn-success', 'Create');
    }


    public function getAsHtml()
    {
        return
            "\t<form action='$this->action'  method='$this->method'>\n" .
            "\t\t<table class='table'>\n"
            . "\t\t\t" . $this->hiddenIdInput->getAsHtml() . " \n"
            . $this->nameInput->getAsHtml() . "\n"
            . $this->priceInput->getAsHtml() . "\n"
            . $this->descriptionInput->getAsHtml() . "\n"
            . $this->conditionInput->getAsHtml() . "\n"
            . $this->categoryInput->getAsHtml() . "\n"
            . $this->submitButtonInput->getAsHtml() . "\n"
            . "\t\t</table>\n" .
            "\t</form>\n";
    }

   
}