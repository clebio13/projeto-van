<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Gerenciar Rotas</title>
	<link rel="stylesheet" href="style.css"  media="all" />
</head>
<body>
	<div class="tudo" align="center">
		<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<p><h1 align="center">Vans</h1></p>
			<table border="2">
			<tr bgcolor="#CCCCCC"> 
			<td >ID Rota</td>	 
			<td >Cidade Origem</td>	    
			<td >Cidade Destino</td>	    
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
		$id = $row['ID_ROTA'];
		$cidadeOrigem = $row['CIDADE_ORIGEM'];
		$cidadeDestino = $row['CIDADE_DESTINO'];

	  	echo "
		<tr> 
	    <td>$id</td>
	    <td>$cidadeOrigem</td>
	    <td>$cidadeDestino</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
	</table>
	
	<br />
	<br />
		<form method="POST"  action= "excluirCadastro.php" >
			<fieldset>
				<h2>Excluir Cadastro: </h2>
				<p>
				<input type="text" name="ID_ROTA" placeholder="ID DA ROTA" />
				</p>		
	
				<p class="botaoAdmin">
					<input type="submit" value="Excluir" />
					<input type="reset" name="limpar" value="Limpar" />
					<input type="button" onclick="location.href='paginaMotorista.php';" value="Voltar" />
				</p >
			</fieldset>
		</form>

		</div>
</div>
</body>
</html>
