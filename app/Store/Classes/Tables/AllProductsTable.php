<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 05/05/2016
 * Time: 10:17
 */

namespace Store\Classes\Tables;


use Store\Classes\Database\GenericDatabaseOperations;
use Store\Classes\Forms\TableForm;
use Store\Classes\Model\Product;
use Store\Interfaces\IHtmlBuilder;

class AllProductsTable extends TableBase implements IHtmlBuilder
{
    private $tableHtml = "";

    public function getAsHtml()
    {
        $this->appendToTable("<table class='{$this->class}'> \n");

        $this->appendProductInformationToTable();

        $this->appendToTable("</table> \n");

        return $this->tableHtml;
    }

    private function appendToTable($content)
    {
        $this->tableHtml .= $content;
    }

    private function appendProductInformationToTable()
    {
        $dbConnection = GenericDatabaseOperations::getInstance();
        $productsFromDatabase = $dbConnection->listFromTable('produtos');

        $product = new Product();
        foreach ($productsFromDatabase as $currentProductAsArrayFromDatabase) {
            $product = $product->extractProductFromDatabaseArray($currentProductAsArrayFromDatabase);
            $this->appendToTable("\t<tr>\n");

            $this->appendToTable("\t\t<td>\n \t\t\t");
            $this->appendToTable($product->getName());
            $this->appendToTable("\n\t\t</td>\n");

            $this->appendToTable("\t\t<td>\n \t\t\t");
            $this->appendToTable($product->getPrice());
            $this->appendToTable("\n\t\t</td>\n");

            $this->appendToTable("\t\t<td>\n \t\t\t");
            $this->appendToTable(substr($product->getDescription(), 0, 40));
            $this->appendToTable("\n\t\t</td>\n");

            $this->appendToTable("\t\t<td>\n \t\t\t");
            $this->appendToTable($dbConnection->searchForCategoryNameWithId($product->getId()));
            $this->appendToTable("\n\t\t</td>\n");

            $this->appendToTable("\t\t<td>\n \t\t\t");
            $alterForm = new TableForm('placeholder.php', 'POST', $product->getId(), 'update', 'btn btn-default');
            $this->appendToTable($alterForm->getAsHtml());
            $this->appendToTable("\n\t\t</td>\n");

            $this->appendToTable("\t\t<td>\n \t\t\t");
            $removeForm = new TableForm('placeholder.php', 'POST', $product->getId(), 'delete', 'btn btn-danger');
            $this->appendToTable($removeForm->getAsHtml());
            $this->appendToTable("\n\t\t</td>\n");

            $this->appendToTable("\t</tr>\n");
        }
    }
}