<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loja.css">
    <title>Autenticação de Usuário</title>
</head>

<body id="page">
    <div class="form-box">
        <h1>Login do Usuário</h1>
        <form action="autentica.php" method="post">
            Email: <input type="text" name="email"><br />
            Senha: <input type="password" name="senha"><br />
            <input id="botao" type="submit" value="Logar">

        </form>
    </div>
    <?php

    if (isset($_GET['erro'])) {
        if ($_GET['erro'] == 'dados_incorretos') {
            $msg = "Email e/ou Senha incorretos.";
        } elseif ($_GET['erro'] == 'acesso_negado') {
            $msg = "Acesso Negado.";
        }

        echo $msg;

        echo "<script>";
        echo "alert('" . $msg . "');";
        echo "</script>";
    }

    ?>

</body>

</html>