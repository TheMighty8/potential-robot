<?php include "cabecalho.php" ?>

<h1>Bem vindo!</h1>

<?php if (User::checkIfIsLoggedIn(ObjectFactoryService::getSession())) : ?>
    <p class="text-success">Você está logado como <?= User::getEmailFromSession(ObjectFactoryService::getSession()) ?>. <a
            href="<?= "logout.php" ?>">Deslogar</a>
    </p>
<?php else : ?>
    <h2>Login</h2>
    <form action="<?= "login.php" ?>" method="post">
        <table class="table">   
            <tr>
                <td>Email</td>
                <td><input title="email" class="form-control" type="email" name="email"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input title="senha" class="form-control" type="password" name="senha"></td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary">Login</button>
                </td>
            </tr>
        </table>
    </form>
<?php endif ?>

<?php include("rodape.php"); ?>
