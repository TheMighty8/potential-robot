<?php
require "../../../vendor/autoload.php";


use Store\Classes\Controller\FormController;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlElements\Tables\AllProductsTable;

FormController::varifyUserPermissions();

$table = new AllProductsTable("table table-hover table-stripped");
$table = $table->getAsHtml();
$allProductsTablePage = new HtmlBuilder([$table]);

echo $allProductsTablePage->getAsHtml();

die();
