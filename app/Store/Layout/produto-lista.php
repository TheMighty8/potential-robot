<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php
User::checkPermissions(ObjectFactoryService::getSession());

$productDAO = new ProductDAO();

$genericOperations = GenericDatabaseOperations::getInstance();
?>

<?php include 'cabecalho.php' ?>

<table class="table table-striped table-bordered">
    <?php
    $productsFromDatabaseAsArray = $genericOperations->listFromTable("produtos");
    $product = new Product();
    foreach ($productsFromDatabaseAsArray as $databaseArrayItem) :
        $product = $product->extractProductFromDatabaseArray($databaseArrayItem); ?>
        <tr>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getPrice() ?></td>
            <td><?= substr($product->getDescription(), 0, 40) ?></td>
            <td><?= $genericOperations->searchForCategoryNameWithId($product->getCategoryId()) ?></td>
            <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $product->getId() ?>">alterar</a></td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?= $product->getId() ?>">
                    <button class="btn btn-danger">remover</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<?php include 'rodape.php' ?>
