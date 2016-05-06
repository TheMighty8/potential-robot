<?php
namespace Store\Layout;
error_reporting(E_ALL ^ E_NOTICE || E_WARNING);
require_once("mostra-alerta.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="<?= PROJECT_ROOT_URL . 'Layout/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?= PROJECT_ROOT_URL . 'Layout/css/loja.css' ?>">
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= PROJECT_ROOT_URL . 'Layout/index.php' ?>">Minha Loja</a>
        </div>

        <div>
            <ul class="nav navbar-nav">
                <li><a href="<?= PROJECT_ROOT_URL . 'Layout/produto-formulario.php' ?> ">Adiciona Produto</a></li>
                <li><a href="<?= PROJECT_ROOT_URL . 'Layout/produto-lista.php' ?>">Produtos</a></li>
                <li><a href="<?= PROJECT_ROOT_URL . 'Layout/contato.php' ?>">Contato</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="principal">
        <?php mostraAlerta("success"); ?>
        <?php mostraAlerta("danger"); ?>
			