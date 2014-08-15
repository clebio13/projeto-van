<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8" />
		<title>Formulario PHP</title>
		<link rel="stylesheet" href="style.css"  media="all" />
	<style>
	</style>
	</head>
<body>
	<div class="tudo" align="center">
		<div class="topo"></div>
		<div class="conteudo">
		
		<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
		
			<h1>PASSAGEIROS</h1>
		<div>
		<table  border="1">
			<tr bgcolor="#CCCCCC"> 
			<td >ID</td>
			<td >Nome Usuario</td>
			<td >Senha</td>
			<td >Nome</td>
			<td >Endereco</td>
			<td>Telefone1</td>
			<td>Telefone2</td>
			<td>Tipo</td>
		</tr>
		
		
<?php	

	session_start();
	
	if(isset($_SESSION['auth'])) {
		include ("conexao.php");	
	}else{
		session_destroy();
		header("LOCATION:index.html?msg=SESSAO_FINALIZADA");
	}

	$strSQL = "SELECT * FROM usuario WHERE TIPO = 'passageiro'";

	$rs = mysql_query($strSQL);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($rs,MYSQL_BOTH)) {
		$idPassageiro = $row['ID_USUARIO'];
		$Nomeusuario = $row['NOME_USUARIO'];
		$senha = $row['SENHA'];
		$nome = $row['NOME'];
		$endereco = $row['ENDERECO'];
		$telefone1 = $row['TELEFONE1'];
		$telefone2 = $row['TELEFONE2'];
		$cnh = $row['CNH'];
		$tipo = $row['TIPO'];

	  	echo "
		<tr> 
	    <td>$idPassageiro</td>
	    <td>$Nomeusuario</td>
	    <td>$senha</td>
	    <td>$nome</td>
	    <td>$endereco</td>
	  	<td>$telefone1</td>
	  	<td>$telefone2</td>
	  	<td>$tipo</td>
	  	</tr>";	
	}
	// Encerra a conexão
	mysql_close($conexao);
?>
		</table>
		</div>
	
	
	<div>
	<p class="botaoAdmin">
	<input type="button" onclick="location.href='paginaAdministrador.html';" value="VOLTAR" />
	<input type="button" onclick="location.href='gerenciarPassageiros.php';" value="GERENCIAR PASSAGEIROS" />
	</p>
	</div>
	</div>
</div>
</body>
</html>
