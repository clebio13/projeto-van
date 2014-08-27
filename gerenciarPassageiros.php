<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>Gerenciar Passageiros</title>
		<link rel="stylesheet" href="style.css"  media="all" />
	</head>
<body>
	<div class="tudo" align="center">
	<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
				
			<p><h1>PASSAGEIROS</h1></p>
			<table width="30%" border="1">
			<tr bgcolor="#CCCCCC"> 
			<td >Login</td>	 
			<td >Nome Completo</td>	    
			</tr>
		
<?php	
	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}

	$strSQL1 = "SELECT * FROM USUARIO WHERE NIVEL = 3";

	$rs1 = mysql_query($strSQL1);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs1,MYSQL_BOTH)) {
		$login = $row['LOGIN'];	

	  	echo "
		<tr> 
	    <td>$login</td>";	
	}

	$strSQL = "SELECT * FROM PASSAGEIRO";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$Nome = $row['NOME_COMPLETO'];
		
	  	echo "
		
	    <td>$Nome</td></tr>";
	  	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
		</table>
		
		<br />
		<br />
		
			<div>
			<form method="POST"  action= "excluirCadastro.php">
				<fieldset>
					<h2>Excluir Cadastro: </h2>
					<p>
						<input type="text" name="LOGIN" placeholder="Login" />
						<input type="hidden" name="NIVEL" value="3" /><br />
					</p>		
	
					<p class="botaoAdmin">
						<input type="submit" name="excluir"value="Excluir" />
						<input type="reset" name="limpar" value="Limpar" />
						<input type="button" onclick="location.href='tabelaPassageiro.php';" value="Voltar" />
					</p >
				</fieldset>
			</form>
			</div>
		</div>	
</div>
</body>
</html>
