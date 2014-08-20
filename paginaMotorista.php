<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8" />
	<title>Pagina Motorista</title>
	<link rel="stylesheet" href="style.css"  media="all" />
<script type="text/javascript"> 
function redirecionar(){ 
if(confirm("Tem certeza que deseja sair do sistema?")){
location.href='logout.php'; 
}else{
location.href='paginaMotorista.php';
} 
} 
</script>
</head>
<body>
	<div id="tudo" align="center">
	<div class="topo"></div>
	<div id="conteudo" >
	
	<p ><img src="imagens/pegvan.png" width="300" height="100" alt="topo"/></p>
	
		<form class="alinhar">
			<fieldset>
			<p><h1 align="center">MOTORISTA</h1></p>
			<p class="botaoAdmin">
				<input type="button" onclick="location.href='formularioVan.html';" value="CADASTRAR VANS" /><br />
				<input type="button" onclick="location.href='tabelaVan.php';" value="EXIBIR CADASTRO DE VANS" /><br />
				<!-- <input type="button" onclick="location.href='';" value="GERENCIAR ROTAS E PREÇOS" /><br />
				<input type="button" onclick="location.href='';" value="CONSULTAR PASSAGENS VENDIDAS" /><br /> -->
				<input type="button" onclick="redirecionar();" value="SAIR" />
			</p>
</fieldset>
</form>

</div>
</div>
</body>
</html>
