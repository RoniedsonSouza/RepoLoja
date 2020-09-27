<?php

    require_once '../produtos.php';
    require_once 'usuarios.php';
    $con = new Usuario;

    $con->conectar("projeto_login", "localhost", "root", "");
    $deletar = $pdo->prepare("DELETE FROM produtos WHERE id_produto ='$idProd'");
    $deletar->execute();

    if($deletar):
        header("Location: ../Site/admin/produtos.php");
    endif;
?>