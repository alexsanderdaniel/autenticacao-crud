<?php
require_once("conexao.php");

if(isset($_POST['codigo']))
	$codigo = $_POST['codigo'];

if(isset($_POST['nome']))
	$nome = $_POST['nome'];

if(isset($_POST['email']))
	$email = $_POST['email'];

if(isset($_POST['senha']))
	if(!empty($_POST['senha']))
		$senha = sha1($_POST['senha']);
	else
		$senha = "";

if(isset($_POST['ativo']))
	$ativo = $_POST['ativo'];

if(!empty($senha)){
	$consulta = $conexao->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ?, ativo = ? WHERE codigo = ?");
	$consulta->bind_param("ssssd", $nome, $email, $senha, $ativo, $codigo);
}else{
	$consulta = $conexao->prepare("UPDATE usuarios SET nome = ?, email = ?, ativo = ? WHERE codigo = ?");
	$consulta->bind_param("sssd", $nome, $email, $ativo, $codigo);	
}
$consulta->execute();

echo "Cadastro alterado com sucesso.";

?>