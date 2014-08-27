<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Cadastro de Motoristas</title>
	<link rel="stylesheet" href="style.css"  media="all" />
</head>

<body>
	<div class="tudo" align="center">
	<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<p><h1 >MOTORISTAS</h1></p>
			<table border="1" align="center">
			<tr bgcolor="#CCCCCC"> 
				<td >ID</td>
				<td >Email</td>
				<td >Nome Completo</td>
				<td >Endereco</td>
				<td>Telefone1</td>
				<td>Telefone2</td>
				<td>CNH</td>
			</tr>
		
<?php
	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}
	
	$strSQL = "SELECT * FROM MOTORISTA";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$idMotorista = $row['ID_MOTORISTA'];
		$email = $row['EMAIL'];
		$nomeCompleto = $row['NOME_COMPLETO'];	
		$endereco = $row['ENDERECO'];
		$telefone1 = $row['TELEFONE1'];
		$telefone2 = $row['TELEFONE2'];
		$cnh = $row['CNH'];

	  	echo "
		<tr> 
	    <td>$idMotorista</td>
	    <td>$email</td>
	    <td>$nomeCompleto</td>
	    <td>$endereco</td>
	  	<td>$telefone1</td>
	  	<td>$telefone2</td>
	  	<td>$cnh</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
		</table>
	<div>
		<p class="botaoAdmin">
		<input type="button" onclick="location.href='paginaAdministrador.php';" value="VOLTAR" />
		<input type="button" onclick="location.href='gerenciarMotoristas.php';" value="GERENCIAR MOTORISTAS" />
		</p>
	</div>
</div>
</div>
</body>
</html>
