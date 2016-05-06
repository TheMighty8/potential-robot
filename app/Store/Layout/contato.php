<?php
require_once '_path.php';
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>


<?php include 'cabecalho.php'?>
    <form action="envia-contato.php" method="post">
        <table class="table">
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" class="form-control"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" class="form-control"></td>
            </tr>
            <tr>
                <td>Mensagem</td>
                <td><textarea class="form-control" name="mensagem"></textarea></td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary">Enviar</button>
                </td>
            </tr>
        </table>
    </form>

<?php include 'rodape.php'?>