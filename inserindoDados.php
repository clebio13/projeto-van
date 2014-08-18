<?php
session_start();

include ("conexao.php");	//nao tem autenticaçao pois qualquer pessoa pode se cadastrar no sistema

error_reporting(E_ERROR | E_WARNING | E_PARSE); //ignorando um erro do tipo notice

if (isset($_POST['NOME_USUARIO']) && isset($_POST['SENHA'])) { //usado para inserir cadastro de motoristas no banco

$Nomeusuario = $_POST['NOME_USUARIO'];
$senha = $_POST['SENHA'];
$email = $_POST['EMAIL'];
$nomeCompleto = $_POST['NOME_COMPLETO'];
$endereco = $_POST['ENDERECO'];
$telefone1 = $_POST['TELEFONE1'];
$telefone2 = $_POST['TELEFONE2'];
$cnh = $_POST['CNH'];


	$busca2 = mysql_query("SELECT * FROM MOTORISTA WHERE NOME_USUARIO = '$Nomeusuario'") or die(mysql_error());

	if(mysql_num_rows($busca2) == 1){
			

	}else{

		$inserir1 = 'INSERT INTO MOTORISTA 
		VALUES ("","'.$Nomeusuario.'","'.$senha.'","'.$email.'","'.$nomeCompleto.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'","'.$cnh.'")';

		mysql_query($inserir1,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:index.html');
	}
		
}else if(isset($_POST['PLACA']) && isset($_POST['CHASSI'])){ //usado para inserir os dados da van no banco de dados
	
	$placa = $_POST['PLACA'];
	$chassi = $_POST['CHASSI'];
	$ano = $_POST['ANO'];

	$busca2 = mysql_query("SELECT * FROM VAN WHERE PLACA = '$placa'") or die(mysql_error());

	if(mysql_num_rows($busca2) == 1){
		echo "<script>alert('A van com essa placa ja esta cadastrada. Tente Novamente!');top.location.href='formularioVan.html';</script>";

	}else{

		$inserir2 = 'INSERT INTO VAN 
		VALUES ("","'.$placa.'","'.$chassi.'","'.$ano.'","")';

		mysql_query($inserir2,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');
	}
}
?>


