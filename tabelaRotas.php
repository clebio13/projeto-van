<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Tabela Rotas</title>
	<link rel="stylesheet" href="style.css"  media="all" />
</head>

<body>
	<div class="tudo" align="center">
	<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<p><h1 >ROTAS</h1></p>
			<table border="1" align="center">
			<tr bgcolor="#CCCCCC"> 
				<td >ID Rota</td>
				<td >Id Motorista</td>
				<td >Cidade Origem</td>
				<td >Cidade Destino</td>
				<td >Preço</td>
			</tr>
		
<?php
	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}
	
	$strSQL = "SELECT * FROM ROTA";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$idRota = $row['ID_ROTA'];
		$idMotorista = $row['ID_MOTORISTA'];
		$cidadeOrigem = $row['CIDADE_ORIGEM'];
		$cidadeDestino = $row['CIDADE_DESTINO'];
		$preco = $row['PRECO'];
	
	  	echo "
		<tr> 
		<td>$idRota</td>
	    <td>$idMotorista</td>
	    <td>$cidadeOrigem</td>
	    <td>$cidadeDestino</td>
	    <td>$preco</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
		</table>
	<div>
		<p class="botaoAdmin">
		<input type="button" onclick="location.href='paginaMotorista.php';" value="VOLTAR" />
		<input type="button" onclick="location.href='gerenciarRotas.php';" value="GERENCIAR ROTAS" />
		</p>
	</div>
</div>
</div>
</body>
</html>
