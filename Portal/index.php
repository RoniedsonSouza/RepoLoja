<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div id="corpo-form">
            <h2>Entrar</h2>
            <form method="POST">
                <input type="login" name="login" placeholder="Usuario" maxlenght="30">
                <input type="password" name="senha" placeholder="Senha" maxlenght="32">
                <input class="btn btn-primary" type="submit" value="ACESSAR">
                <a style="text-align:center; display:block;" href="cadastrar.php">Entre em contato conosco!</a>
            </form>
        </div>
        <?php
            if(isset($_POST['login']))
            {
                $login = addslashes($_POST['login']);
                $senha = addslashes($_POST['senha']);
                //Verificar se não esta vazio

                if(!empty($login) && !empty($senha))
                {
                    $u->conectar("projeto_login", "localhost", "root", "");
                    if($u->msgErro == "")
                    {
                        if($u->logar($login, $senha))
                        {
                            header("location: ../Site/admin/adminSite.php");
                        }
                        else
                        {
                            ?>
                                <div class="msg-erro">
                                    Login e/ou senha estão incorretos!
                                </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                            <?php echo "Erro: ".$u->msgErro;?>
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            Preencha todos os campos!
                        </div>
                    <?php
                }
            }



        ?>
    </body>
</html>