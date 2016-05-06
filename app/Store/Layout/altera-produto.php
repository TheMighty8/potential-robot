<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php
$product = new Product();
$productDAO = new ProductDAO();

$product->setId($_POST['id'])
    ->setName($_POST['nome'])
    ->setPrice($_POST['preco'])
    ->setDescription($_POST['descricao'])
    ->setCategoryId($_POST['categoria_id']);

if (array_key_exists('usado', $_POST)) {
    $product->setCondition(true);
} else {
    $product->setCondition(false);
}
?>

<?php include 'cabecalho.php' ?>

<?php if ($productDAO->updateProductInTable($product, "produtos")) : ?>

    <p class="text-success">O produto <?= $product->getName() ?> foi alterado.</p>

<?php else : $msg = mysqli_error(ObjectFactoryService::getDb()); ?>

    <p class="text-danger">O produto <?= $product->getName() ?> não foi alterado: <?= $msg ?></p>

<?php endif; ?>

<?php include "rodape.php" ?>
