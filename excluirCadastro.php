<?php
	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}

if (isset($_POST['NOME_USUARIO']) && isset($_POST['TIPO'])) { //usado para excluir cadastro de motoristas

$Nomeusuario = $_POST['NOME_USUARIO'];
$tipo = $_POST['TIPO'];

$busca1 = mysql_query("SELECT * FROM usuario WHERE NOME_USUARIO = '$Nomeusuario' AND TIPO = '$tipo'") or die(mysql_error());

	if(mysql_num_rows($busca1) < 1){
		echo "<script>alert('Nome de Usuario nao Existe. Digite um nome valido!');top.location.href='paginaAdministrador.html';</script>";
	}else{

		$delete = "DELETE FROM usuario WHERE NOME_USUARIO ='$Nomeusuario' AND TIPO = '$tipo'";

		mysql_query($delete)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaAdministrador.html');
	}
}else if(isset($_POST['PLACA'])) { //usado para excluir cadastro de vans

$placa = $_POST['PLACA'];

$busca2 = mysql_query("SELECT * FROM van WHERE PLACA = '$placa'") or die(mysql_error());

	if(mysql_num_rows($busca2 < 1)){
		echo "<script>alert('Veiculo com a placa digitada nao esta cadastrado no sistema!');top.location.href='paginaAdministrador.html';</script>";		
	}else{
		$delete2 = "DELETE FROM van WHERE PLACA ='$placa'";

		mysql_query($delete2)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.html');
	}

}

?>


