<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;

    // UPLOAD INICIO
	$conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn, "projeto_login");

    // select USUARIOS PARA TABELA
    $query_user = "select * from usuarios";
    $users = mysqli_query($conn, $query_user);

    // function fotoUser(){
    //     $conn = mysqli_connect("localhost","root","");
    //     mysqli_select_db($conn, "projeto_login");
    //     $query_user = "select * from usuarios";

    //     $users2 =  mysqli_query($conn, $query_user);
    //     $teste = mysqli_fetch_array($users2);
    //     $id = $teste['id_usuario'];

    //     $msg = false;

    //     if(isset($_FILES['arquivo'])){
    //         $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    //         $novo_nome = md5(time()) . $extensao;
    //         $diretorio = "imgUser/";

    //         move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    //         $sql_code = "INSERT INTO ft_user (arquivo, id_user) VALUES ('$novo_nome', '$id')";
    //         if($conn->query($sql_code))
    //             $msg = "Arquivo enviado com sucesso!";
    //         else
    //             $msg = "Falha ao enviar arquivo";

    //         header('Location: usuarios.php');
    //     }
    // }
?>

<head>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#ModalNewUser').on('show.bs.modal', function() {
        $(this).find('input:text').val('');
        $(this).find('input:password').val('');
    });
});

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
.form-group {
    width: fit-content;
    float: left;
}

#formEditUser .form-group, #formNewUser .form-group{
    margin-left: 1em;
}


</style>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php require('menuLateral.php'); ?>
        <main class="page-content">
            <div class="container-fluid">
                <h2>Usuarios</h2>
                <hr>
                <div class="row">
                    <div class="form-group col-md-12">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewUser">Novo Usuário</button>

                        <!-- Modal Novo usuario -->
                        <div class="modal fade" id="ModalNewUser" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Novo Usuário</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formNewUser" method="POST" action="classes/cadUsuario.php" enctype="multipart/form-data" style="margin-bottom: 0;">
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Nome:</label>
                                                <input name="nome" placeholder="Nome do Usuario" type="text" class="form-control" id="recipient-name"
                                                    maxlength="50">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-user" class="control-label">Login:</label>
                                                <input name="user" placeholder="Nome do login" type="text" class="form-control" id="recipient-user">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-cel" class="control-label">Celular:</label>
                                                <input name="celular" placeholder="(00) 00000-0000" type="text" class="form-control"
                                                    id="recipient-cel">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-senha" class="control-label">Senha:</label>
                                                <input name="senha" placeholder="Senha" type="password" class="form-control"
                                                    id="recipient-senha">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-csenha" class="control-label">Confirmar
                                                    Senha:</label>
                                                <input name="confSenha" type="password" class="form-control"
                                                    id="recipient-csenha">
                                            </div>
                                            <div style="clear: both; text-align: end; padding: 1rem 1rem 0;" class="modal-footer">
                                                <button type="submit" class="btn btn-success">Criar</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Editar usuario -->
                        <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Editar Usuário</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditUser" method="POST" action="classes/editUser.php" enctype="multipart/form-data" style="margin-bottom: 0;">
                                            <label>Cod:.</label>
                                            <input name="id" style="cursor: default; width: 5em; display: inline; margin-bottom: 1em;"
                                                type="text" class="form-control" id="id-curso" value="" readonly>
                                            <div class="form-group" style="float: none;">
                                                <div class="inline" style="margin-bottom: 1rem;">
                                                    <img style="width: 150px; height: 150px;" id="imagem"><br>
                                                </div>
                                                <input type="file" name="arquivo" onchange="previewImagem()">
                                                <!-- <input type="submit" value="Adicionar"> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Nome:</label>
                                                <input name="edit_nome" type="text" class="form-control"
                                                    id="edrecipient-name" maxlength="50">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-user" class="control-label">Login:</label>
                                                <input name="edit_user" type="text" class="form-control"
                                                    id="edrecipient-user">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-cel" class="control-label">Celular:</label>
                                                <input name="edit_celular" type="text" class="form-control"
                                                    id="edrecipient-cel">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-senha" class="control-label">Senha:</label>
                                                <input name="edit_senha" type="password" class="form-control"
                                                    id="edrecipient-senha">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-csenha" class="control-label">Confirmar
                                                    Senha:</label>
                                                <input name="edit_confSenha" type="password" class="form-control"
                                                    id="edrecipient-csenha">
                                            </div>
                                            <div style="clear: both; text-align: end; padding: 1rem 1rem 0;" class="modal-footer">
                                                <button type="submit" class="btn btn-success">Alterar</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered" style="margin-top: 1em; text-align: center;">
                            <thead class="table-dark">
                                <tr>
                                    <td>Id</td>
                                    <td>Login</td>
                                    <td>Nome</td>
                                    <td>Telefone</td>
                                    <td>Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($user = mysqli_fetch_array($users)) { ?>
                                <tr>
                                    <td><?php echo $user['id_usuario'] ?></td>
                                    <td><?php echo $user['login'] ?></td>
                                    <td><?php echo $user['nome'] ?></td>
                                    <td><?php echo $user['telefone'] ?></td>
                                    <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditUser"
                                            data-whatever="<?php echo $user['id_usuario']; ?>"
                                            data-whatevernome="<?php echo $user['nome']; ?>"
                                            data-whatevercel="<?php echo $user['telefone']; ?>"
                                            data-whateverlogin="<?php echo $user['login']; ?>"
                                            data-whateversenha="<?php echo md5($user['senha']); ?>">Editar</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
    $('#modalEditUser').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        var recipientcel = button.data('whatevercel')
        var recipientlogin = button.data('whateverlogin')
        var recipientsenha = button.data('whateversenha')

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#id-curso').val(recipient)
        modal.find('#edrecipient-name').val(recipientnome)
        modal.find('#edrecipient-cel').val(recipientcel)
        modal.find('#edrecipient-user').val(recipientlogin)
        modal.find('#edrecipient-senha').val(recipientsenha)
        modal.find('#edrecipient-csenha').val(recipientsenha)

    })
    </script>
</body>