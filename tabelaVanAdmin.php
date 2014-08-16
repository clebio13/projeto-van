<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Cadastros de Vans</title>
	<link rel="stylesheet" href="style.css"  media="all" />
</head>

<body>
	<div class="tudo" align="center">
	<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<p><h1 >VANS</h1></p>
			<table border="1" align="center">
			<tr bgcolor="#CCCCCC"> 
				<td >ID Van</td>
				<td >Placa</td>
				<td >Chassi</td>
				<td >Ano</td>
				<td >ID Motorista</td>
			</tr>
		
<?php
	session_start();
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}
	
	$strSQL = "SELECT * FROM VAN";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$idvan = $row['ID_VAN'];
		$placa = $row['PLACA'];
		$chassi = $row['CHASSI'];
		$ano = $row['ANO'];
		$idmotorista = $row['ID_MOTORISTA'];

	  	echo "
		<tr>
		<td>$idvan</td> 
	    <td>$placa</td>
	    <td>$chassi</td>
	    <td>$ano</td>
	    <td>$idmotorista</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
		</table>
	<div>
		<p class="botaoAdmin">
		<input type="button" onclick="location.href='paginaAdministrador.html';" value="VOLTAR" />
		
		<input type="button" onclick="location.href='gerenciarVans.php';" value="GERENCIAR VANS" />
		</p>
	</div>
</div>
</div>
</body>
</html>
