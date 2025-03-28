<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Formulário de Cadastro de Usuário</title>
	<meta charset="UTF-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="loja.css">
</head>

<body>
	<div class="form-box">
		<h1>Formulário de Cadastro</h1>
		<form action="cadastrar_dados.php" name="frmCadastro" id="frmCadastro">
			Nome: <br />
			<input type="text" name="nome" required><br />
			E-mail: <br />
			<input type="email" name="email" required><br />
			Senha: <br />
			<input type="password" name="senha" required><br />
			Ativo: <br />
			<select name="ativo">
				<option></option>
				<option value="1">Ativo</option>
				<option value="0">Não Ativo</option>
			</select><br /><br />

			<button type="submit" id="cadastrar">Cadastrar</button>
		</form>
	</div>
	<br />
	<div id="simple-msg"></div>

	<script>
		$(function() {

			$("#cadastrar").click(function() {

				$("#frmCadastro").submit(function(e) {

					var postData = $(this).serializeArray();
					var formURL = $(this).attr("action");
					$.ajax({
						url: formURL,
						type: "POST",
						data: postData,
						success: function(data, textStatus, jqXHR) {
							$("#simple-msg").html(data);
							$('#frmCadastro')[0].reset();

						},
						error: function(jqXHR, textStatus, errorThrown) {

							var error = textStatus + '<br/>' + errorThrown;
							$("#simple-msg").html(error);
						}
					});
					e.preventDefault(); //STOP default action
					e.unbind();
				});

			});

		});
	</script>
</body>

</html>