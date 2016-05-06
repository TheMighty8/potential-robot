<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php
GenericDatabaseOperations::getInstance()->deleteWithIdFromTable($_POST['id'], "produtos");

ObjectFactoryService::getSession()->put('success', 'Produto removido com sucesso');

header("Location: produto-lista.php");

die();
?>


 