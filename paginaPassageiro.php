<!DOCTYPE html>
<html>
<head>
	<title>Pagina Passageiro</title>
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
			}?></h1></p>

			<p class="botaoAdmin">
				<input type="button" onclick="location.href='paginaPassageiro.php';" value="FUNCIONALIDADES EM BREVE" /><br />
				<input type="button" onclick="location.href='logout.php';" value="SAIR" />
			</p>
		</fieldset>
	</form>

</div>
</div>

</body>
</html>

