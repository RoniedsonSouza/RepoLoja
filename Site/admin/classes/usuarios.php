<?php

class Usuario
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

    public function cadastrar($nome, $telefone, $login, $senha)
    {
        global $pdo;
        //verificar se ja exite o cadastro
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE login = :l");
        $sql->bindValue(":l",$login);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        //caso não, cadastrar
        else
        {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, login, senha) VALUES (:n, :t, :l, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":l",$login);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }

    public function logar($login, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE login = :l AND senha = :s");
        $sql->bindValue(":l",$login);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            //Entra na sessão (sistema)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //Logado realizado com sucesso
        }
        else
        {
            return false;
        }
    }

    public function editar($id, $nome, $telefone, $login, $senha)
    {
        global $pdo;

        //verificar se ja exite o cadastro
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE login = :l");
        $sql->bindValue(":l",$login);
        $sql->execute();
        if($sql->rowCount() > 1)
        {
            return false;
        }
        //caso não, cadastrar
        else
        {
        //atualiza CADASTRO
            $sql = $pdo->prepare("UPDATE usuarios (nome, telefone, login, senha) VALUES (:n, :t, :l, :s) WHERE id_usuario = '$id'");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":l",$login);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }
}



?>