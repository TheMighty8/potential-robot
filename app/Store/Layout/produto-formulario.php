<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';

User::checkPermissions(ObjectFactoryService::getSession());

$categories = GenericDatabaseOperations::getInstance()->listFromTable("categorias");
?>

<?php include 'cabecalho.php'?>

<h1>Formulário de produto</h1>
<form action="adiciona-produto.php" method="post">
    <table class="table">

        <?php include("produto-formulario-base.php"); ?>

        <tr>
            <td>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>			
