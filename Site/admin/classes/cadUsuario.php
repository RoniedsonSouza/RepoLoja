<?php
            require_once 'usuarios.php';
            $u = new Usuario;

            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['celular']);
                $login = addslashes($_POST['user']);
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
                                header('Location: admin/usuarios.php');
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