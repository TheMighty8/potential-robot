<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php
$genericDatabaseOps = GenericDatabaseOperations::getInstance();

$product = $genericDatabaseOps->searchForIdInTable($_GET['id'], "produtos");

$categories = $genericDatabaseOps->listFromTable("categorias");

$usado = $product['usado'] ? "checked='checked'" : "";
?>

<?php include 'cabecalho.php' ?>
<h1>Alterando produto</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <table class="table">
        <?php include("produto-formulario-base.php"); ?>
        <tr>
            <td>
                <button class="btn btn-primary" type="submit">Alterar</button>
            </td>
        </tr>
    </table>
</form>
<?php include 'rodape.php' ?>
