<?php
	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}

if (isset($_POST['NOME_USUARIO']) && isset($_POST['CNH'])) { //usado para excluir cadastro de motoristas

	$Nomeusuario = $_POST['NOME_USUARIO'];
	$cnh = $_POST['CNH'];

	$busca1 = mysql_query("SELECT * FROM MOTORISTA WHERE NOME_USUARIO = '$Nomeusuario' AND CNH = '$cnh'") or die(mysql_error());

	if(mysql_num_rows($busca1) < 1){
		echo "<script>alert('Nao foi possivel excluir. Tente Novamente!');top.location.href='paginaAdministrador.html';</script>";
	}else{

		$delete = "DELETE FROM MOTORISTA WHERE NOME_USUARIO ='$Nomeusuario' AND CNH = '$cnh'";

		mysql_query($delete)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaAdministrador.html');
		}
}elseif (isset($_POST['NOME_USUARIO'])) {//usado para excluir cadastro de passageiro

	$Nomeusuario = $_POST['NOME_USUARIO'];

	$busca2	= mysql_query("SELECT * FROM PASSAGEIRO WHERE NOME_USUARIO = '$Nomeusuario'") or die(mysql_error());

	if(mysql_num_rows($busca2) < 1){
		echo "<script>alert('Nome de Usuario nao Existe. Digite um nome valido!');top.location.href='paginaAdministrador.html';</script>";
	}else{

		$delete2 = "DELETE FROM PASSAGEIRO WHERE NOME_USUARIO ='$Nomeusuario'";

		mysql_query($delete2)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaAdministrador.html');
	}

}else if(isset($_POST['PLACA'])) { //usado para excluir cadastro de vans

	$placa = $_POST['PLACA'];

	$busca3 = mysql_query("SELECT * FROM VAN WHERE PLACA = '$placa'") or die(mysql_error());

	if(mysql_num_rows($busca3 < 1)){
		echo "<script>alert('Veiculo com a placa digitada nao esta cadastrado no sistema!');top.location.href='paginaAdministrador.html';</script>";		
	}else{
		$delete3 = "DELETE FROM van WHERE PLACA ='$placa'";

		mysql_query($delete3)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.html');
	}

}

?>


