<?php
require "../../../vendor/autoload.php";

use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\Tables\AllProductsTable;

$table = new AllProductsTable("table table-hover table-stripped");
$table = $table->getAsHtml();
$allProductsTablePage = new HtmlBuilder([$table]);

echo $allProductsTablePage->getAsHtml();

die();
