
<?php 
    require_once 'classes/usuarios.php';
    $con = new Usuario;
?>

<head>
</head>

<script type="text/javascript">

    function tableProd() {
        var x = document.getElementById("produtos");
        if (x.style.display === "none") {
            x.style.display = "table";
        } else {
            x.style.display = "none";
        }
    }

    function tableNewProd() {
        var z = document.getElementById("formNovoProd");
        if (z.style.display === "none") {
            z.style.display = "flex";
        } else {
            z.style.display = "none";
        }
    }

    function atualizaPag(){
        $('#formNovoProd')[0].reset();
        location.reload();
        header('Refresh:0');
    }

    window.setTimeout(function () {
    $(".msg-erro").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
    }, 3000);
</script>

<body>
<div class="page-wrapper chiller-theme toggled">
<?php require('menuLateral.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Produtos</h2>
      <hr>
      <div class="row">
        <div class="form-group col-md-12">
          <button class="btn btn-info" onclick="tableNewProd()">
            Novo produto
          </button>
          <button class="btn btn-info" onclick="tableProd()">
            Produtos
          </button>
          </br>
          <form id="formNovoProd" method="POST" style="display: none; margin-top: 15px;">
            <label>Nome do Produto:</label>
            <input type="text" name="nome" placeholder="Nome do produto" required>
            <label>Quantidade:</label>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <label>Valor:</label>
            <input type="text" name="valor" placeholder="Valor" required>
            <label>Descrição:</label>
            <textarea name="descricao" style="resize: none;"></textarea>
            <label>Mostrar no Site</label>
            <input type="checkbox" name="cbMostraSite">
            <label>Tipo do produto:</label>
            <select id="tipos" name="tipo" required>
                <option value="0">Selecione...</option>
                <option value="1">Camisas</option>
                <option value="2">Calças</option>
                <option value="3">Shots</option>
                <option value="4">Acessorios</option>
                <option value="5">Sapatos/tenis</option>
                <option value="6">Moletons</option>
            </select>
            <input href="#" type="submit" name="adicionarProd" value="SALVAR" onclick="atualizaPag()">
        </form>
          <table id="produtos" class="table thead-dark" style="display:none;">
            <tbody>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Descrição
                    </th>
                    <th>
                        Quantidade
                    </th>
                    <th>
                        Valor
                    </th>
                    <th>
                        Tipo
                    </th>
                    <th>
                        Mostrar no site
                    </th>
                    <th>
                        Ações
                    </th>
                </tr>
                <?php 
                $prods = $pdo->prepare("SELECT * FROM produtos");
                $prods->execute();
                while($produtos = $prods->fetch(PDO::FETCH_ASSOC)){
                    $idProd = $produtos['id_produto'];
                    $nome = $produtos['nome_prod'];
                    $descricao = $produtos['descricao_prod'];
                    $quantidade = $produtos['quantidade_prod'];
                    $valor = $produtos['valor_prod'];
                    $tipo = $produtos['tipo_prod'];
                    $cbSite = $produtos['cb_mostraSite'];
                 ?>
                <tr>
                    <td><?php echo $nome?></td>
                    <td><?php echo $descricao?></td>
                    <td><?php echo $quantidade?></td>
                    <td>R$<?php echo number_format($valor,2,",","."); ?>
                    </td>
                    <td>
                        <?php 
                        switch ($tipo)
                            {
                                case 1:
                                    echo "Camisa";
                                break;
                                case 2:
                                    echo "Calça";
                                break;
                                case 3:
                                    echo "Short";
                                break;
                                case 4:
                                    echo "Acessorio";
                                break;
                                case 5:
                                    echo "Sapato";
                                break;
                                case 6:
                                    echo "Moleton";
                                break;
                            }
                            ?>
                    </td>
                    <td>
                        <input type="checkbox" name="cbSite" 
                        <?php 
                        if($cbSite == 1)
                        { 
                            ?> 
                                checked
                            <?php
                        }
                            ?> >
                            <div class="d-none"><?php echo $cbSite?></div>
                        </input>
                    </td>
                    <td id="acProds">
                        <a href="#"><i class="fas fa-edit"> </i></a>
                        <a href="../admin/classes/apagarProduto.php?id=<?php echo $idProd ?>"><i class="fas fa-trash-alt"> </i></a>
                        <a href="#"><i class="fas fa-images"> </i></a>
                    </td>
                </tr>
                <?php
                }  ?>
                <tr>
                    
                </tr>
                <tr>
                    
                </tr>
            </tbody>
          </table>
        
        </div>
      </div>
      
      <hr>

      <?php require('footerAdmin.php'); ?>
    </div>
  </main>
  </div>
  <?php 
                if(isset($_POST['nome']))
                {
                    $nome = $_POST['nome'];
                    $descricao = $_POST['descricao'];
                    $quantidade = $_POST['quantidade'];
                    $valor = $_POST['valor'];
                    $tipo = $_POST['tipo'];
                    $cbMostraSite = $_POST['cbMostraSite'];
                    if(empty($cbMostraSite))
                    {
                        $cbMostraSite = 0;
                    }
                    else
                    {
                        $cbMostraSite = 1;
                    }
                    if(!empty($nome) && !empty($quantidade) && !empty($valor) && !empty($tipo))
                    {
                        $con=mysqli_connect("localhost", "root", "");
                        mysqli_select_db($con, "projeto_login");
                        $insProd = "INSERT INTO produtos (nome_prod, descricao_prod, quantidade_prod, valor_prod, tipo_prod, cb_mostraSite) 
                        VALUES ('$nome','$descricao','$quantidade','$valor','$tipo','$cbMostraSite')";
                        $res = mysqli_query($con, $insProd);
                        $linhas = mysqli_affected_rows($con);

                        if($linhas == 1)
                        {
                            echo "Produto cadastrado com sucesso!";
                        }
                        else
                        {
                            ?>
                            <div class="msg-erro">
                                Erro ao cadastrar produto!
                            </div>
                            <?php
                        }

                        mysqli_close($con);
                        // header('refresh:0');
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                            Preencha os campos principais!
                        </div>
                        <?php
                    }
                }
  ?>
  </body>