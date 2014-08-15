<?php
session_start();

if(isset($_SESSION['auth'])) {
	include ("conexao.php");	
}else{
	session_destroy();
	header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
}

error_reporting(E_ERROR | E_WARNING | E_PARSE); //ignorando um erro do tipo notice

if (isset($_POST['NOME_USUARIO']) && isset($_POST['SENHA'])) { //usado para inserir cadastro de motoristas e passageiros no banco

$Nomeusuario = $_POST['NOME_USUARIO'];
$senha = $_POST['SENHA'];
$email = $_POST['EMAIL'];
$nome = $_POST['NOME'];
$endereco = $_POST['ENDERECO'];
$telefone1 = $_POST['TELEFONE1'];
$telefone2 = $_POST['TELEFONE2'];
$cnh = $_POST['CNH'];
$tipo = $_POST['TIPO'];

$busca = mysql_query("SELECT * FROM usuario WHERE NOME_USUARIO = '$Nomeusuario'") or die(mysql_error());

	if(mysql_num_rows($busca) == 1){
		echo "<script>alert('Nome de Usuario ja Existe. Tente Novamente!');top.location.href='index.html';</script>";

	}else{

		$inserir = 'INSERT INTO usuario 
		VALUES ("","'.$Nomeusuario.'","'.$senha.'","'.$email.'","'.$nome.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'","'.$cnh.'","'.$tipo.'")';

		mysql_query($inserir,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaAdministrador.html');
	}
}else if(isset($_POST['PLACA']) && isset($_POST['CHASSI'])){ //usado para inserir os dados da van no banco de dados
	$placa = $_POST['PLACA'];
	$chassi = $_POST['CHASSI'];

	$busca2 = mysql_query("SELECT * FROM van WHERE PLACA = '$placa'") or die(mysql_error());

	if(mysql_num_rows($busca2) == 1){
		echo "<script>alert('A van com essa placa ja esta cadastrada. Tente Novamente!');top.location.href='formularioVan.html';</script>";

	}else{

		$inserir2 = 'INSERT INTO van 
		VALUES ("'.$placa.'","'.$chassi.'")';

		mysql_query($inserir2,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');
	}
}
?>


