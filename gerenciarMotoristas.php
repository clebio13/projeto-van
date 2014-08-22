<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Gerenciar Motoristas</title>
	<link rel="stylesheet" href="style.css"  media="all" />
</head>
<body>
	<div class="tudo" align="center">
		<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<p><h1 align="center">MOTORISTAS</h1></p>
			<table border="2">
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

	$strSQL1 = "SELECT * FROM USUARIO WHERE NIVEL = 2";

	$rs1 = mysql_query($strSQL1);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs1,MYSQL_BOTH)) {
		$login = $row['LOGIN'];	

	  	echo "
		<tr> 
	    <td>$login</td>";	
	}

	$strSQL = "SELECT * FROM MOTORISTA";

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
	
		<br/>
		<br/>
		
		<form method="POST"  action= "excluirCadastro.php" >
			<fieldset>
				<h2>Excluir Cadastro: </h2>
				<p>
				<input type="text" name="LOGIN" placeholder="Login" />
				<input type="text" name="NOME_COMPLETO" placeholder="Nome Completo" />
				<input type="hidden" name="NIVEL" value="2" /><br />
				</p>		
	
				<p class="botaoAdmin">
					<input type="submit" value="Excluir" />
					<input type="reset" name="limpar" value="Limpar" />
					<input type="button" onclick="location.href='tabelaMotorista.php';" value="Voltar" />
				</p >
			</fieldset>
		</form>

		</div>
</div>
</body>
</html>
