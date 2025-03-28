<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação de Usuário</title>
</head>
<body id="page">
    <?php


session_start();

require_once("conexao.php");

$email = $_POST['email'];
$senha = sha1($_POST['senha']);


$sql = "SELECT * FROM usuarios WHERE email = '$email' && senha = '$senha' LIMIT 1";
$resultado_usuario = mysqli_query($conexao, $sql);
$resultado = mysqli_fetch_assoc($resultado_usuario);

if (isset($resultado['ativo']))
{
    if($resultado['ativo'] == 1)
    {
        if (isset($resultado['email']) && isset($resultado['senha']))
        {
            session_start();
			$_SESSION['logado'] = 1;
            header("Location: listar_usuarios.php");
        } else
        {
            echo "Usuário inválido";
        }   
    } else
    {
        header("Location: login.php?erro=acesso_negado");
    }
}else
{
    header("Location: login.php?erro=dados_incorretos");
}
    ?>
    
</body>
</html>