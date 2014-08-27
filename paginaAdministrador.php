<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Pagina Administrador</title>
	<link rel="stylesheet" href="style.css"  media="all" />

</head>
<body>
	<div id="tudo" align="center">
	<div class="topo"></div>
	<div id="conteudo" >
	
	<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
	
		<form class="alinhar">
			<fieldset>
			<p><h1 align="center">
			
			<?php
			session_start();
			
			if(isset($_SESSION['nomeuser'])) {
				include ("conexao.php");
				echo "Bem Vindo '".$_SESSION['nomeuser']."'";	
			}else{
				echo "Bem Vindo 'ifrn'";	
			}?></h1></p>
			<p class="botaoAdmin">
				<input type="button" onclick="location.href='formularioAdministrador.html';" value="CADASTRAR ADMINISTRADOR" /><br />
				<input type="button" onclick="location.href='tabelaAdministrador.php';" value="EXIBIR CADASTRO DE ADMINISTRADORES" /><br />
				<input type="button" onclick="location.href='tabelaMotorista.php';" value="EXIBIR CADASTRO DE MOTORISTAS" /><br />
				<input type="button" onclick="location.href='tabelaPassageiro.php';" value="EXIBIR CADASTRO DE PASSAGEIROS" /><br />
				<input type="button" onclick="location.href='tabelaVanAdmin.php';" value="EXIBIR CADASTRO DE VANS" /><br />
				<!-- <input type="button" onclick="location.href='';" value="GERENCIAR ROTAS E PREÇOS" /><br />
				<input type="button" onclick="location.href='';" value="CONSULTAR PASSAGENS VENDIDAS" /><br />
				 --><input type="button" onclick="location.href='logout.php';" value="SAIR" />
			</p>
</fieldset>
</form>
<hr />
</div>
</div>
</body>
</html>
