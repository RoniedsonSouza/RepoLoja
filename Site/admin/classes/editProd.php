<?php
	// UPLOAD INICIO

	$conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn, "projeto_login");

    $msg = false;

    if(!isset($_FILES['arquivo'])){
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

        $sql_code = "insert into arquivo (arquivo, data) VALUES ('$novo_nome', NOW())";
        if($conn->query($sql_code))
            $msg = "Arquivo enviado com sucesso!";
        else
            $msg = "Falha ao enviar arquivo";

        // header('Location: /sistemasite/site/admin/produtos.php');
    }

	// UPLOAD FIM

	include_once("conexao.php");
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);
	$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
	// $cbSite = mysqli_real_escape_string($conn, $_POST['cbEditSite']);
	$categoria = mysqli_real_escape_string($conn, $_POST['categorias']);

	echo "$id - $nome - $detalhes - $valor - $quantidade - $tipo - $categoria";

	$result_cursos = "UPDATE produtos SET nome_prod='$nome', descricao_prod ='$detalhes', 
	valor_prod='$valor', quantidade_prod='$quantidade', tipo_prod='$tipo', 
	fl_categoria='$categoria' WHERE id_produto = '$id'";
	
	$resultado_cursos = mysqli_query($conn, $result_cursos);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body>
	<?php if ($msg != false) echo "<p> $msg </p>"; ?>
		<?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;/sistemasite/Site/admin/produtos.php'>
				<script type=\"text/javascript\">
					alert(\"Produto alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;/sistemasite/Site/admin/produtos.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao alterar Produto.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>