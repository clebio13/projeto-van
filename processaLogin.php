<?php

include ("conexao.php");

if (isset($_POST['login']) && isset($_POST['senha'])) {
	
$login = $_POST['login'];
$senha = $_POST['senha'];

	$logininok = false;

	$sql = mysql_query("SELECT * FROM usuario WHERE NOME_USUARIO = '$login' AND SENHA = '$senha'");

	while ($row = mysql_fetch_array($sql,MYSQL_BOTH)) {
		$loginok = true;
	}
}

if($login == 'ifrn' AND $senha == 'tads'){
	$loginok=true;
	//$_SESSION['auth'] = true;
}	

mysql_close($conexao);

if ($loginok) {

	if($login == 'ifrn' AND $senha == 'tads'){
		session_start();
		$_SESSION['auth'] = true;
		header('LOCATION:paginaAdministrador.html');
	}else if($tipo == 'passageiro'){
		session_start();
		$_SESSION['auth'] = true;
		header('LOCATION:paginaPassageiro.php');		
	}else{
		session_start();
		$_SESSION['auth'] = true;
		header('LOCATION:paginaMotorista.php');		
	}

}else{
	header('LOCATION:index.html?msg=FALHOU');

}	


?>
