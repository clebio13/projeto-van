<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>Tabela Administradores</title>
		<link rel="stylesheet" href="style.css"  media="all" />
	<style>
	</style>
	</head>
<body>
	<div class="tudo" align="center">
		<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<h1>ADMINISTRADORES</h1>
		<div>
		<table  border="1">
			<tr bgcolor="#CCCCCC"> 
			<td >ID</td>
			<td >Login</td>
			<td>Nivel</td>
		</tr>		
<?php	

	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}
	echo "
		<tr> 
	    <td>- </td>
	    <td>ifrn2014</td>
	    <td> Administrador Padrao</td>
	  	</tr>";	

	$strSQL = "SELECT * FROM USUARIO WHERE NIVEL = 1";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$idAdministrador = $row['ID_USUARIO'];
		$login = $row['LOGIN'];
		$nivel = $row['NIVEL'];
		

	  	echo "
		<tr> 
	    <td>$idAdministrador</td>
	    <td>$login</td>
	    <td>$nivel</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
		</table>
		</div>
	
	
	<div>
	<p class="botaoAdmin">
	<input type="button" onclick="location.href='paginaAdministrador.php';" value="VOLTAR" />
	<input type="button" onclick="location.href='gerenciarAdministradores.php';" value="GERENCIAR ADMINISTRADORES" />
	</p>
	</div>
	</div>
</div>
</body>
</html>	
