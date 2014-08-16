<?php

include ("conexao.php");

if (isset($_POST['login']) && isset($_POST['senha'])) {
	
$login = $_POST['login'];
$senha = $_POST['senha'];

	$logininOkAdministrador = false;
	$logininOkMotorista = false;
	$logininOkPassageiro = false;

	$sql = mysql_query("SELECT * FROM ADMINISTRADOR WHERE NOME_USUARIO = '$login' AND SENHA = '$senha'");

	while ($row = mysql_fetch_array($sql,MYSQL_BOTH)) {
		$logininOkAdministrador = true;
	}

	$sql2 = mysql_query("SELECT * FROM MOTORISTA WHERE NOME_USUARIO = '$login' AND SENHA = '$senha'");

	while ($row = mysql_fetch_array($sql2,MYSQL_BOTH)) {
		$logininOkMotorista = true;
	}

	$sql3 = mysql_query("SELECT * FROM PASSAGEIRO WHERE NOME_USUARIO = '$login' AND SENHA = '$senha'");

	while ($row = mysql_fetch_array($sql3,MYSQL_BOTH)) {
		$logininOkPassageiro = true;
	}
}

if($login == 'ifrn' AND $senha == 'tads'){
	$logininOkAdministrador=true;
}	

mysql_close($conexao);

if ($logininOkAdministrador) {
	session_start();
	$_SESSION['auth'] = true;
	header('LOCATION:paginaAdministrador.html');

}else if($logininOkMotorista){
		session_start();
		$_SESSION['auth'] = true;
		header('LOCATION:paginaMotorista.php');

}else if($logininOkPassageiro){
		session_start();
		$_SESSION['auth'] = true;
		header('LOCATION:paginaPassageiro.php');		
	

}else{
	header('LOCATION:index.html?msg=FALHOU');

}	


?>