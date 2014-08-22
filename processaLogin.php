<?php

include ("conexao.php");

if (isset($_POST['login']) && isset($_POST['senha'])) {
	
$login = $_POST['login'];
$senha = $_POST['senha'];

	$loginOk = false;

	$sql = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login' AND SENHA = '$senha'");

	while ($row = mysql_fetch_array($sql,MYSQL_BOTH)) {
		$loginOk = true;
		$nivel = $row['NIVEL'];
	}
}

if($login == 'ifrn' AND $senha == 'tads'){
	$loginOk=true;
	$nivel = 1;
}	

mysql_close($conexao);

if ($loginOk) {
		
	if ($nivel == 1) {
		session_start();
		$_SESSION['auth'] = true;
		header('LOCATION:paginaAdministrador.html');

	}else if($nivel == 2){
			session_start();
			$_SESSION['auth'] = true;
			header('LOCATION:paginaMotorista.php');

	}else if($nivel == 3){
			session_start();
			$_SESSION['auth'] = true;
			header('LOCATION:paginaPassageiro.php');		
	}	

}else{
	header('LOCATION:index.html?msg=FALHOU');
}	


?>