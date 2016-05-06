<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php
User::checkPermissions(ObjectFactoryService::getSession());

$produto = new Product();
$productDAO = new ProductDAO();

$produto->setName($_POST['nome'])
    ->setPrice($_POST['preco'])
    ->setDescription($_POST['descricao'])
    ->setCategoryId($_POST['categoria_id']);

if (array_key_exists('usado', $_POST)) {
    $produto->setCondition(true);
} else {
    $produto->setCondition(false);
}
?>

<?php require_once "cabecalho.php" ?>

<?php if ($productDAO->insertProductInTable($produto, "produtos")) : ?>

    <p class="text-success">O produto <?= $produto->getName() ?> foi adicionado.</p>

<?php else : $msg = mysqli_error(ObjectFactoryService::getDb()); ?>

    <p class="text-danger">O produto <?= $produto->getName() ?> não foi adicionado: <?= $msg ?></p>

<?php endif ?>

<?php include "rodape.php" ?>
