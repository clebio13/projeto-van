<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Pagina Motorista</title>
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
				<input type="button" onclick="location.href='formularioVan.html';" value="CADASTRAR VANS" /><br />
				<input type="button" onclick="location.href='tabelaVan.php';" value="EXIBIR CADASTRO DE VANS" /><br />
				<input type="button" onclick="location.href='formularioRotas.html';" value="CADASTRAR ROTAS E PREÇOS" /><br />
				<input type="button" onclick="location.href='tabelaRotas.php';" value="EXIBIR TABELA DE ROTAS" /><br />
				<!-- <input type="button" onclick="location.href='';" value="CONSULTAR PASSAGENS VENDIDAS" /><br /> -->
				<input type="button" onclick="location.href='logout.php';" value="SAIR" />
			</p>
		</fieldset>
	</form>

</div>
</div>
<?php
/*
	if(isset($_SESSION['perfil_motorista'])){
		if($_SESSION['perfil_motorista']){
			//cadastra van
		}else{
			//nao eh motorista
		}
    	
	}*/
?>
</body>
</html>
