<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php
$userDAO = new UserDAO();
$user = $userDAO->findUser($_POST["email"], $_POST["senha"]);

if ($user == null){
    header("Location: " . PROJECT_ROOT_URL);
} else{
    User::loginInSession(ObjectFactoryService::getSession(), $user['email']);
    header("Location: " . PROJECT_ROOT_URL);
}
die();