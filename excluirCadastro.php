<?php
	session_start();
	
if(isset($_SESSION['auth'])) {
	include ("conexao.php");	
}else{
	session_destroy();
	header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
}
if ($_POST['NIVEL'] == 1) {
	if (isset($_POST['LOGIN'])) { //usado para excluir cadastro de administradores

		$login = $_POST['LOGIN'];

		$busca1 = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login' AND NIVEL = 1") or die(mysql_error());

		if(mysql_num_rows($busca1) < 1){
			echo "<script>alert('Nao foi possivel excluir. Tente Novamente!');top.location.href='gerenciarAdministradores.php';</script>";
		}else{

			$delete = "DELETE FROM USUARIO WHERE LOGIN ='$login' AND NIVEL = 1";

			mysql_query($delete)or die("Erro!".mysql_error());
			mysql_close($conexao);

			header('location:gerenciarAdministradores.php');
		}
	}
}else if ($_POST['NIVEL'] == 2) { //usado para excluir cadastro de motoristas
		
		$login = $_POST['LOGIN'];
		$nomeCompleto = $_POST['NOME_COMPLETO'];
		
		$busca1 = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login' AND NIVEL = 2") or die(mysql_error());
		$busca2 = mysql_query("SELECT * FROM MOTORISTA WHERE NOME_COMPLETO = '$nomeCompleto'") or die(mysql_error());

		if(mysql_num_rows($busca1) < 1 || mysql_num_rows($busca2) < 1){
			echo "<script>alert('Nao foi possivel excluir. Tente Novamente!');top.location.href='gerenciarMotoristas.php';</script>";
		}else{
				$delete = "DELETE FROM USUARIO WHERE LOGIN ='$login' AND NIVEL = 2";
				$delete2 = "DELETE FROM MOTORISTA WHERE NOME_COMPLETO ='$nomeCompleto'";

				mysql_query($delete)or die("Erro!".mysql_error());
				mysql_query($delete2)or die("Erro2!".mysql_error());
				mysql_close($conexao);

				header('location:gerenciarMotoristas.php');	
		}
	
}elseif ($_POST['NIVEL'] == 3){//usado para excluir cadastro de passageiro

		$login = $_POST['LOGIN'];
		$nomeCompleto = $_POST['NOME_COMPLETO'];
		
		$busca3 = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login' AND NIVEL = 3") or die(mysql_error());
		$busca4 = mysql_query("SELECT * FROM PASSAGEIRO WHERE NOME_COMPLETO = '$nomeCompleto'") or die(mysql_error());

		if(mysql_num_rows($busca3) < 1 || mysql_num_rows($busca4) < 1){
			echo "<script>alert('Nao foi possivel excluir. Tente Novamente!');top.location.href='gerenciarPassageiros.php';</script>";
		}else{
				$delete3 = "DELETE FROM USUARIO WHERE LOGIN ='$login' AND NIVEL = 3";
				$delete4 = "DELETE FROM PASSAGEIRO WHERE NOME_COMPLETO ='$nomeCompleto'";

				mysql_query($delete4)or die("Erro!".mysql_error());
				mysql_query($delete3)or die("Erro2!".mysql_error());
				mysql_close($conexao);

				header('location:gerenciarPassageiros.php');	
		}
}else if(isset($_POST['PLACA'])) { //usado para excluir cadastro de vans

	$placa = $_POST['PLACA'];

	$busca3 = mysql_query("SELECT * FROM VAN WHERE PLACA = '$placa'") or die(mysql_error());

	if(mysql_num_rows($busca3 < 1)){
		echo "<script>alert('Veiculo com a placa digitada nao esta cadastrado no sistema!');top.location.href='paginaAdministrador.html';</script>";		
	}else{
		$delete3 = "DELETE FROM VAN WHERE PLACA ='$placa'";

		mysql_query($delete3)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');
	}

}else if(isset($_POST['ID_ROTA'])) { //usado para excluir cadastro de vans

	$idRota = $_POST['ID_ROTA'];

	$busca3 = mysql_query("SELECT * FROM ROTA WHERE ID_ROTA = '$idRota'") or die(mysql_error());

	if(mysql_num_rows($busca3 < 1)){
		echo "<script>alert('A rota nao esta cadastrada no sistema!');top.location.href='paginaAdministrador.html';</script>";		
	}else{
		$delete3 = "DELETE FROM ROTA WHERE ID_ROTA ='$idRota'";

		mysql_query($delete3)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');
	}

}

?>


