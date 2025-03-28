<?php
require_once("conexao.php");
require_once("verifica.php");

$id = $_GET['id'];

$sql = "SELECT codigo, nome, email, ativo FROM usuarios
 WHERE codigo = {$id}";
 
$consulta = $conexao->query($sql);

$linha = mysqli_fetch_array($consulta);

//print_r($linha);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Formulário de Edição de Usuário</title>
		<meta charset="UTF-8"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="css/login.css">
	</head>
	<body>
        <div class="form-box">
		<h1>Formulário de Edição</h1>
		<form action="editar_dados.php" name="frmCadastro" id="frmCadastro">
			<input type="hidden" name="codigo" value="<?php echo $linha['codigo']; ?>">
			Código: <br/><?php echo $linha['codigo']; ?><br/>
			Nome: <br/>
			<input type="text" name="nome" value="<?php echo $linha['nome']; ?>" required><br/>
			E-mail: <br/>
			<input type="email" name="email" value="<?php echo $linha['email']; ?>" required><br/>
			Senha: <br/>
			<input type="password" id="senha" name="senha"><br/>
			ativo: <br/>
			<select name="ativo">
				<option></option>
				<option value="1" <?php if($linha['ativo'] == '1') echo "selected"; ?>>Ativo</option>
				<option value="0" <?php if($linha['ativo'] == '0') echo "selected"; ?>>Não Ativo</option>
			</select><br/><br/>
			<button type="submit" id="cadastrar">Editar</button>
		</form>
        </div>
		<br/>
		<div id="simple-msg"></div>
		
		<script>
			$(function(){
				
				$("#cadastrar").click(function(){

					$("#frmCadastro").submit(function(e)
					{
						
						var postData = $(this).serializeArray();
						var formURL = $(this).attr("action");
						$.ajax(
						{
							url : formURL,
							type: "POST",
							data : postData,
							success:function(data, textStatus, jqXHR) 
							{
								$("#simple-msg").html(data);
								$("#senha").val("");
								
							},
							error: function(jqXHR, textStatus, errorThrown) 
							{
								
								var error = textStatus + '<br/>' +errorThrown;
								$("#simple-msg").html(error);
							}
						});
						e.preventDefault();	//STOP default action
						e.unbind();
					});
					
				});
				
			});

		</script>
	</body>
</html>