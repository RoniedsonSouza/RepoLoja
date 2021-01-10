<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
            require_once 'usuarios.php';
            $u = new Usuario;

            if(isset($_POST['edit_nome']) || isset($_FILES['arquivo']))
            {
                $id = addslashes($_POST["id"]);
                $nome = addslashes($_POST['edit_nome']);
                $telefone = addslashes($_POST['edit_celular']);
                $login = addslashes($_POST['edit_user']);
                $senha = addslashes($_POST['edit_senha']);
                $confirmarSenha = addslashes($_POST['edit_confSenha']);
                //Verificar se não esta vazio

                $conn = mysqli_connect("localhost","root","");
                mysqli_select_db($conn, "projeto_login");
        
                $msg = false;
            
                $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
                $novo_nome = md5(time()) . $extensao;
                $diretorio = "imgUser/";
            
                move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
                // INSERE FOTO
                $sql_code = "INSERT INTO ft_user (arquivo, id_user) VALUES ('$novo_nome', '$id')";
                if($conn->query($sql_code))
                    $msg = "Arquivo enviado com sucesso!";
                else
                    $msg = "Falha ao enviar arquivo";
            

                if(!empty($nome) && !empty($telefone) && !empty($login) && !empty($senha))
                {
                    $u->conectar("projeto_login", "localhost", "root", "");
                    if($u->msgErro == "")
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->editar($id, $nome, $telefone, $login, $senha))
                            {
                                echo "<script type='text/javascript'>alert('Usuario Alterado com Sucesso!');";
                                echo "javascript:window.location='/sistemasite/Site/admin/usuarios.php';</script>";
                            }
                            else
                            {
                                echo "<script type='text/javascript'>alert('Login já existe!');";
                                echo "javascript:window.location='/sistemasite/Site/admin/usuarios.php';</script>";
                            }
                        }
                        else
                        {
                            echo "<script type='text/javascript'>alert('Senhas não correspondem!');";
                                echo "javascript:window.location='/sistemasite/Site/admin/usuarios.php';</script>";
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
                    echo "<script type='text/javascript'>alert('Preencha todos os campos!');";
                                echo "javascript:window.location='/sistemasite/Site/admin/usuarios.php';</script>";
                }
            }
        
        
        ?>
</body>