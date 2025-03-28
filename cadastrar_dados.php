<?php

require_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = sha1 ($_POST['senha']);
$ativo = $_POST['ativo'];

$consulta = $conexao->prepare("INSERT INTO usuarios(nome, email, senha, ativo) VALUES (?,?,?,?)");

$consulta->bind_param("ssss", $nome, $email, $senha, $ativo);

$consulta->execute();

echo "Cadastro realizado com sucesso!";
