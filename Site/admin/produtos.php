<?php

?>

<head>
</head>
<script type="text/javascript">

    $(document).ready( function () {
        $('#produtos').DataTable({
            "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando Página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponivel",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
        });
    } );

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

    function atualizaPag() {
        // $('#formNovoProd')[0].reset();
        // location.reload();
        // header('Refresh:0');
    }

    window.setTimeout(function() {
        $(".msg-erro").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<style>
    .table-bordered td,
    .table-bordered th {
        border: 1px solid gray !important;
    }
</style>

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
                        <form id="formNovoProd" action="classes/insertProd.php" method="POST" style="display: none; margin-top: 15px;">
                            <table id="formTableProd">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label>Nome do Produto:</label>
                                        </td>
                                        <td>
                                            <input type="text" name="nome" placeholder="Nome do produto" required>
                                        </td>
                                        <td>
                                            <label>Quantidade:</label>
                                        </td>
                                        <td>
                                            <input type="number" name="quantidade" placeholder="Quantidade" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Valor:</label>
                                        </td>
                                        <td>
                                            <input type="text" name="valor" placeholder="Valor" required>
                                        </td>
                                        <td>
                                            <label>Descrição:</label>
                                        </td>
                                        <td style="padding: 4px;">
                                            <textarea name="descricao" style="resize: none;"></textarea>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Mostrar no Site?</label>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="cbMostraSite">
                                        </td>
                                        <td>
                                            <label>Tipo do produto:</label>
                                        </td>
                                        <td style="padding: 4px;">
                                            <select id="tipos" name="tipo" required>
                                                <option value="0">Selecione...</option>
                                                <option value="1">Camisas</option>
                                                <option value="2">Calças</option>
                                                <option value="3">Shots</option>
                                                <option value="4">Acessorios</option>
                                                <option value="5">Sapatos/tenis</option>
                                                <option value="6">Moletons</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input href="#" type="submit" name="adicionarProd" value="SALVAR" onclick="atualizaPag()">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <table id="produtos" class="table table-striped table-bordered" style="display:none;">
                            <tbody>
                                <tr>
                                    <th>
                                        Código
                                    </th>
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
                                while ($produtos = $prods->fetch(PDO::FETCH_ASSOC)) {
                                    $idProd = $produtos['id_produto'];
                                    $nome = $produtos['nome_prod'];
                                    $descricao = $produtos['descricao_prod'];
                                    $quantidade = $produtos['quantidade_prod'];
                                    $valor = $produtos['valor_prod'];
                                    $tipo = $produtos['tipo_prod'];
                                    $cbSite = $produtos['cb_mostraSite'];
                                ?>
                                    <tr>
                                    <td><?php echo $idProd ?></td>
                                        <td><?php echo $nome ?></td>
                                        <td><?php echo $descricao ?></td>
                                        <td><?php echo $quantidade ?></td>
                                        <td>R$<?php echo number_format($valor, 2, ",", "."); ?>
                                        </td>
                                        <td>
                                            <?php
                                            switch ($tipo) {
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
                                            <input type="checkbox" name="cbSite" <?php
                                                                                    if ($cbSite == 1) {
                                                                                    ?> checked <?php
                                                                                    }
                                        ?>>
                                            <div class="d-none"><?php echo $cbSite ?></div>
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
                            </tbody>
                        </table>

                    </div>
                </div>

                <hr>

                <?php require('footerAdmin.php'); ?>
            </div>
        </main>
    </div>

</body>