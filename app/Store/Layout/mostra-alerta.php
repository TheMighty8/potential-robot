<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';
?>

<?php  function mostraAlerta($tipo) {?>

	<?php  if (ObjectFactoryService::getSession()->get('usuario_logado')) : ?>
		<p class="alert-<?= $tipo ?>"><?= ObjectFactoryService::getSession()->get($tipo)?> </p>
	<?php endif ?>

<?php } ?>
