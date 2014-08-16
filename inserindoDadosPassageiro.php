<?php
session_start();

include ("conexao.php");	//nao tem autenticaçao pois qualquer pessoa pode se cadastrar no sistema

//error_reporting(E_ERROR | E_WARNING | E_PARSE); //ignorando um erro do tipo notice
var_dump($_POST);
if (isset($_POST['NOME_USUARIO']) && isset($_POST['SENHA'])) { //usado para inserir cadastro de passageiros no banco

$Nomeusuario = $_POST['NOME_USUARIO'];
$senha = $_POST['SENHA'];
$email = $_POST['EMAIL'];
$nomeCompleto = $_POST['NOME_COMPLETO'];
$endereco = $_POST['ENDERECO'];
$telefone1 = $_POST['TELEFONE1'];
$telefone2 = $_POST['TELEFONE2'];


	$busca = mysql_query("SELECT * FROM PASSAGEIRO WHERE NOME_USUARIO = '$Nomeusuario'") or die(mysql_error());

	if(mysql_num_rows($busca) == 1){
			
		echo "<script>alert('Nome de Usuario ja Existe. Tente Novamente!');top.location.href='index.html';</script>";

	}else{

		$inserir = 'INSERT INTO PASSAGEIRO 
		VALUES ("","'.$Nomeusuario.'","'.$senha.'","'.$email.'","'.$nomeCompleto.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'")';

		mysql_query($inserir,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:index.html');

	}
}
?>


