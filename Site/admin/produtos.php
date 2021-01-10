<?php
include('classes/classProdutos.php');

// conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "projeto_login");

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

//seleciona todos os itens da tabela
$cmd = "SELECT * FROM produtos";
$produtos = mysqli_query($conn, $cmd);


//conta o total de itens
$total = mysqli_num_rows($produtos);

//seta a quantidade de itens por página, neste caso, 2 itens
$registros = 10;

//calcula o número de páginas arredondando o resultado para cima
$numPaginas = ceil($total / $registros);

//variavel para calcular o início da visualização com base na página atual
$inicio = ($registros * $pagina) - $registros;

//seleciona os itens por página
$cmd = "select * from produtos limit $inicio,$registros";
$produtos = mysqli_query($conn, $cmd);
$total = mysqli_num_rows($produtos);
?>

<head>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function tableProd() {
    var x = document.getElementById("produtos");
    var y = document.getElementById("Pagination");
    if (x.style.display === "none") {
        x.style.display = "table";
        y.style.display = "block";
    } else {
        y.style.display = "none";
        x.style.display = "none";
    }
}

// function tableNewProd() {
//     var z = document.getElementById("formNovoProd");
//     if (z.style.display === "none") {
//         z.style.display = "flex";
//     } else {
//         z.style.display = "none";
//     }
// }

// function atualizaPag() {
// $('#formNovoProd')[0].reset();
// location.reload();
// header('Refresh:0');
// }

window.setTimeout(function() {
    $(".msg-erro").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);

$('#exampleModalCenter').on('shown.bs.modal', function() {
    $('#btnModal').trigger('focus')
})

function previewImagem() {
    var imagem = document.querySelector('input[name=arquivo]').files[0];
    var preview = document.querySelector('img[id=imagem]');

    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (imagem) {
        reader.readAsDataURL(imagem);
    } else {
        preview.src = "";
    }
}
</script>

<style>
.table-bordered td,
.table-bordered th {
    border: 1px solid gray !important;
}

#formNovoProd div>label {
    display: block;
}

#formEditProd div>label {
    display: block;
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
                        <button id="btnModal" type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Novo Produto
                        </button>
                        <button class="btn btn-info" onclick="tableProd()">
                            Produtos
                        </button>
                        </br>

                        <!-- INICIO MODAL DE INSERIR NOVO PRODUTO -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Produto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formNovoProd" action="classes/insertProd.php" method="POST">
                                            <div class="inline" style="float: left; margin: 0 10px;">
                                                <label>Nome do Produto:</label>
                                                <input type="text" name="nome" placeholder="Nome do produto" required>
                                            </div>
                                            <div class="inline" style="float: left; margin: 0 10px;">
                                                <label>Quantidade:</label>
                                                <input type="number" name="quantidade" placeholder="Quantidade"
                                                    required>
                                            </div>
                                            <div class="inline" style="float: left; margin: 0 10px;">
                                                <label>Valor:</label>
                                                <input type="text" name="valor" placeholder="Valor" required>
                                            </div>
                                            <br />
                                            <div class="inline" style="float: left; clear:both; margin: 0 10px;">
                                                <label>Tipo do produto:</label>
                                                <select id="tipos" name="tipo" style="width: 180px;" required>
                                                    <option value="0">Selecione...</option>
                                                    <option value="1">Camisas</option>
                                                    <option value="2">Calças</option>
                                                    <option value="3">Shots</option>
                                                    <option value="4">Acessorios</option>
                                                    <option value="5">Sapatos/tenis</option>
                                                    <option value="6">Moletons</option>
                                                </select>
                                            </div>
                                            <div class="inline" style="float: left; margin: 0 10px;">
                                                <label>Categoria:</label>
                                                <select id="categorias" name="categoria" style="width: 180px;" required>
                                                    <option value="0">Selecione...</option>
                                                    <option value="1">Masculino</option>
                                                    <option value="2">Feminino</option>
                                                    <option value="3">Infantil</option>
                                                    <option value="4">Unissex</option>
                                                </select>
                                            </div>
                                            <div class="inline"
                                                style="float: left; width: 28%; margin: 3px 10px; text-align: center;">
                                                <label>Mostrar no Site?</label>
                                                <input type="checkbox" name="cbMostraSite">
                                            </div>
                                            <div class="inline" style="clear: both; margin: 0 10px;">
                                                <label>Descrição:</label>
                                                <textarea name="descricao" style="resize: none; width: 385px;"
                                                    rows="5"></textarea>
                                            </div>
                                            <!-- <input href="#" type="submit" class="btn btn-info" name="adicionarProd" value="SALVAR" onclick="atualizaPag()"> -->

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"
                                            name="adicionarProd">Salvar</button>
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Fechar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM -->

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
                                        Quantidade
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Destaque
                                    </th>
                                    <th>
                                        Mostrar no site?
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </tr>
                                <?php
                                while ($produto = mysqli_fetch_array($produtos)) { ?>
                                <tr>
                                    <td><?php echo $produto['id_produto'] ?></td>
                                    <td><?php echo $produto['nome_prod'] ?></td>
                                    <td><?php echo $produto['quantidade_prod'] ?></td>
                                    <td>R$<?php echo number_format($produto['valor_prod'], 2, ",", "."); ?>
                                    </td>
                                    <td>
                                        <?php
                                        switch ($produto['tipo_prod']) {
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
                                            <input type="checkbox" name="cbDest" <?php
                                                if ($produto['cb_destaque'] == 1) {
                                                    ?> checked <?php
                                                    }
                                                ?>>
                                            </input>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="cbSite" <?php
                                            if ($produto['cb_mostraSite'] == 1) {
                                                ?> checked <?php
                                                }
                                            ?>>
                                        </input>
                                    </td>
                                    <td id="acProds">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal"
                                            data-whatever="<?php echo $produto['id_produto']; ?>"
                                            data-whatevernome="<?php echo $produto['nome_prod']; ?>"
                                            data-whateverval="<?php echo $produto['valor_prod']; ?>"
                                            data-whateverqtd="<?php echo $produto['quantidade_prod']; ?>"
                                            data-whatevertp="<?php echo $produto['tipo_prod']; ?>"
                                            data-whateverdetalhes="<?php echo $produto['descricao_prod']; ?>"
                                            data-whatevercateg="<?php echo $produto['fl_categoria']; ?>">
                                            <i class="fas fa-edit"></i></a>
                                        <a
                                            href="../admin/classes/apagarProduto.php?id=<?php echo $produto['id_produto']; ?>">
                                            <i class="fas fa-trash-alt"> </i></a>
                                        <a href="#"><i class="fas fa-images"> </i></a>
                                    </td>
                                </tr>
                                <?php 
                            } 
                            ?>
                            </tbody>
                        </table>
                        
                        <!-- INICIO MODAL DE ALTERAR PRODUTO -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Produtos</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="classes/editProd.php" enctype="multipart/form-data" style="margin: 0;">
                                            <label>Cod:.</label>
                                            <input name="id" style="cursor: default;width: 5em; display: inline; margin-bottom: 1em;" type="text" class="form-control" id="id-curso" value="" readonly>
                                            <div class="inline">
                                                <img style="width: 150px; height: 150px;" id="imagem"><br>
                                            </div>
                                                <input type="file" name="arquivo" onchange="previewImagem()">
                                                <input type="submit" value="Adicionar">
                                            <div class="form-group" style="float: left; margin: 0 10px;">
                                                <label for="recipient-name" class="control-label">Nome:</label>
                                                <input name="nome" type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group inline" style="float: left; margin: 0 10px;">
                                                <label for="valor-text" class="control-label">Valor:</label>
                                                <input name="valor" type="text" class="form-control" id="valor"></input>
                                            </div>
                                            <div class="form-group inline" style="float: left; margin: 0 10px;">
                                                <label for="quantidade-text" class="control-label">Quantidade:</label>
                                                <input name="quantidade" type="number" class="form-control"
                                                    id="quantidade"></input>
                                            </div>
                                            <div class="form-group inline" style="float: left; margin: 0 10px;">
                                                <label for="tipo-text" class="control-label">Tipo do produto:</label>
                                                <select id="tipo" class="form-control" name="tipo"
                                                    style="width: 200px;" required>
                                                    <option value="0">Selecione...</option>
                                                    <option value="1">Camisas</option>
                                                    <option value="2">Calças</option>
                                                    <option value="3">Shots</option>
                                                    <option value="4">Acessorios</option>
                                                    <option value="5">Sapatos/tenis</option>
                                                    <option value="6">Moletons</option>
                                                </select>
                                            </div>
                                            <div class="inline" style="float: left; margin: 0 10px;">
                                                <label>Categoria:</label>
                                                <select id="categ" name="categorias" class="form-control" style="width: 180px;" required>
                                                    <option value="0">Selecione...</option>
                                                    <option value="1">Masculino</option>
                                                    <option value="2">Feminino</option>
                                                    <option value="3">Infantil</option>
                                                    <option value="4">Unissex</option>
                                                </select>
                                            </div>
                                            <div class="form-group inline" style="clear:both; margin: 0 10px 1em;">
                                                <label for="message-text" class="control-label">Detalhes:</label>
                                                <textarea name="detalhes" class="form-control" id="detalhes"
                                                    style="resize: none; width: 385px;" rows="4"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Alterar</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- FIM -->

                        <!-- PAGINAÇÃO -->
                        <nav id="Pagination" aria-label="Page navigation example" style="display:none;">
                            <ul class="pagination justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="produtos.php?pagina=<?php echo $numPaginas - 1; ?>"
                                        tabindex="-1">Anterior</a>
                                </li>
                                <?php
                for ($i = 1; $i < $numPaginas + 1; $i++) { ?>
                                <li class="page-item"><a class="page-link"
                                        href="produtos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php }
                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="produtos.php?pagina=<?php echo $numPaginas; ?>">Proximo</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <hr>
                <?php require('footerAdmin.php'); ?>
            </div>
        </main>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        var recipientval = button.data('whateverval')
        var recipientqtd = button.data('whateverqtd')
        var recipienttp = button.data('whatevertp')
        var recipientcateg = button.data('whatevercateg')
        var recipientdetalhes = button.data('whateverdetalhes')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#id-curso').val(recipient)
        modal.find('#recipient-name').val(recipientnome)
        modal.find('#detalhes').val(recipientdetalhes)
        modal.find('#valor').val(recipientval)
        modal.find('#quantidade').val(recipientqtd)
        modal.find('#tipo').val(recipienttp)
        modal.find('#categ').val(recipientcateg)
    
    })
    </script>
</body>