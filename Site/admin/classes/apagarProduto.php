<?php

    require_once '../produtos.php';
    require_once 'classProdutos.php';
    $con = new Produtos;

    $con->conectar("projeto_login", "localhost", "root", "");
    $deletar = $pdo->prepare("DELETE FROM produtos WHERE id_produto ='$idProd'");
    $deletar->execute();

    header("Location: ../Site/admin/produtos.php");
?>