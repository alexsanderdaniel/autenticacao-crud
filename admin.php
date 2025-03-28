<?php

require_once('verifica.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body id="page">
    <h1>Admin - Dashboard</h1>
    <p>Você está acessando uma área protegida.</p>
    
    <p>Usuário: <?php  
      echo $_SESSION['usuario'];
        ?>
    </p>

    <p>
        <a href="logout.php">Sair</a>
    </p>
  
     
</body>
</html>