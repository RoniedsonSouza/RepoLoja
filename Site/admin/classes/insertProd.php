<?php
    require_once 'classProdutos.php';
    $u = new Produtos;

    if (isset($_POST['nome'])) 
    {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo'];
        $cbMostraSite = $_POST['cbMostraSite'];

        if (!empty($nome) && !empty($quantidade) && !empty($valor) && !empty($tipo)) 
        {
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") {
                if ($u->cadastrar($nome, $descricao, $quantidade, $valor, $tipo, $cbMostraSite)) {
                ?>
                    <div id="msg-sucesso">
                        Produto cadastrado com sucesso!
                    </div>
                <?php
                Header("Location: ../produtos.php");
                exit;
                } else {
                ?>
                    <div class="msg-erro">
                        Produto já existente!
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->msgErro; ?>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
        <?php }
        exit;
    } 
    else{
        $nome = false;
    }
    ?>