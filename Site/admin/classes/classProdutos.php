<?php

class Produtos
{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try 
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } 
        catch (PDOException $e) 
        {
            $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome, $descricao, $quantidade, $valor, $tipo, $cbMostraSite)
    {
        global $pdo;
        //verificar se ja exite o cadastro

        //caso não, cadastrar

            $sql = $pdo->prepare("INSERT INTO produtos (nome_prod, descricao_prod, quantidade_prod, valor_prod, tipo_prod, cb_mostraSite) 
            VALUES (:n, :d, :q, :v, :t, :c)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":d",$descricao);
            $sql->bindValue(":q",$quantidade);
            $sql->bindValue(":v",$valor);
            $sql->bindValue(":t",$tipo);
            $sql->bindValue(":c",$cbMostraSite);
            $sql->execute();
            return true;
    }

    // public function cadCbMostra($idProd, $cbMostraSite)
    // {
    //     global $pdo;

    //         $sql = $pdo->prepare("UPDATE produtos set cb_mostraSite = ':c' where id_produto = '$idProd'");
    //         $sql->bindValue(":c",$cbMostraSite);
    //         $sql->execute();
    //         return true;
    // }
}



?>