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
			<td >Nome Usuario</td>	    
			</tr>
		
<?php	
	include ("conexao.php");


	$strSQL = "SELECT * FROM usuario WHERE TIPO= 'passageiro'";

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
		
		<br />
		<br />
		
			<div>
			<form method="POST"  action= "excluirCadastro.php">
				<fieldset>
					<h2>Excluir Cadastro: </h2>
					<p>
						<input type="text" name="NOME_USUARIO" placeholder="Nome de Usuario" />
						<input type="text" name="TIPO" value="passageiro" readonly><br/>
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
