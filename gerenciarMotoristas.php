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
			<p><h1 align="center">MOTORISTAS</h1></p>
			<table border="2">
			<tr bgcolor="#CCCCCC"> 
			<td >Nome Usuario</td>	    
			</tr>
		
<?php	
	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}

	$strSQL = "SELECT * FROM usuario WHERE TIPO= 'motorista'";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$Nomeusuario = $row['NOME_USUARIO'];

	  	echo "
		<tr> 
	    <td>$Nomeusuario</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
	</table>
		<form method="POST"  action= "excluirCadastro.php" >
			<fieldset>
				<h2>Excluir Cadastro: </h2>
				<p>
				<input type="text" name="NOME_USUARIO" placeholder="Nome de Usuario" />
				<input type="text" name="TIPO" value="motorista" readonly><br/>
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
