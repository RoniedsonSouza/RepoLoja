<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Cadastro</title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    </head>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#telefone").mask("(00) 00000-0000");
        });
    </script>
    <body>
        <div id="corpo-form">
            <h2>Cadastro</h2>
            <form method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" maxlength="50">
                <input id="telefone" type="text" name="telefone" placeholder="Telefone" maxlength="12">
                <input type="login" name="login" placeholder="Usuario" maxlength="30">
                <input type="password" name="senha" placeholder="Senha" maxlength="32">
                <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="32">
                <input class="btn btn-primary" type="submit" value="CADASTRAR">
            </form>
        </div>
        <?php
            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $login = addslashes($_POST['login']);
                $senha = addslashes($_POST['senha']);
                $confirmarSenha = addslashes($_POST['confSenha']);
                //Verificar se não esta vazio

                if(!empty($nome) && !empty($telefone) && !empty($login) && !empty($senha))
                {
                    $u->conectar("projeto_login", "localhost", "root", "");
                    if($u->msgErro == "")
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->cadastrar($nome, $telefone, $login, $senha))
                            {
                                ?>
                                <div id="msg-sucesso">
                                    Cadastro realizado com Sucesso!
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="msg-erro">
                                    Cadastro já existente!
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <div class="msg-erro">
                                    Senhas não correspondem!
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