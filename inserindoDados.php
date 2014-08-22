<?php
session_start();

include ("conexao.php");	//nao tem autenticaçao pois qualquer pessoa pode se cadastrar no sistema

//error_reporting(E_ERROR | E_WARNING | E_PARSE); //ignorando um erro do tipo notice
var_dump($_POST['NIVEL']);
var_dump($_POST['LOGIN']);
var_dump($_POST['SENHA']);
if ($_POST['NIVEL'] == 1) {
	if (isset($_POST['LOGIN']) && isset($_POST['SENHA'])) { //usado para inserir cadastro de administradores no banco

		$login = $_POST['LOGIN'];
		$senha = $_POST['SENHA'];
		$nivel = $_POST['NIVEL'];

			$busca2 = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login'") or die(mysql_error());

			if(mysql_num_rows($busca2) == 1){
					
				echo "<script>alert('Nome de Usuario ja Existe. Tente Novamente!');top.location.href='formularioAdministrador.html';</script>";

			}else{

				$inserir1 = 'INSERT INTO USUARIO 
				VALUES ("","'.$login.'","'.$senha.'","'.$nivel.'")';

				$inserir2 = 'INSERT INTO ADMINISTRADOR 
				VALUES ("")';
				
				mysql_query($inserir1,$conexao)or die("Erro!".mysql_error());
				mysql_query($inserir2,$conexao)or die("Erro2!".mysql_error());
				
				
				mysql_close($conexao);

				header('location:index.html');
			}
	}
}
else if ($_POST['NIVEL'] == 2) {
	if (isset($_POST['LOGIN']) && isset($_POST['SENHA'])) { //usado para inserir cadastro de motoristas no banco

		$login = $_POST['LOGIN'];
		$senha = $_POST['SENHA'];
		$nivel = $_POST['NIVEL'];
		$email = $_POST['EMAIL'];
		$nomeCompleto = $_POST['NOME_COMPLETO'];
		$endereco = $_POST['ENDERECO'];
		$telefone1 = $_POST['TELEFONE1'];
		$telefone2 = $_POST['TELEFONE2'];
		$cnh = $_POST['CNH'];


			$busca2 = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login'") or die(mysql_error());

			if(mysql_num_rows($busca2) == 1){
					
				echo "<script>alert('Nome de Usuario ja Existe. Tente Novamente!');top.location.href='formularioMotorista.html';</script>";

			}else{

				$inserir1 = 'INSERT INTO USUARIO 
				VALUES ("","'.$login.'","'.$senha.'","'.$nivel.'")';

				$inserir2 = 'INSERT INTO MOTORISTA 
				VALUES ("","'.$email.'","'.$nomeCompleto.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'","'.$cnh.'")';
				
				mysql_query($inserir1,$conexao)or die("Erro!".mysql_error());
				mysql_query($inserir2,$conexao)or die("Erro2!".mysql_error());
				
				
				mysql_close($conexao);

				header('location:index.html');
			}
	}
}else if ($_POST['NIVEL'] == 3) {
	if (isset($_POST['LOGIN']) && isset($_POST['SENHA'])) { //usado para inserir cadastro de passageiros no banco

		$login = $_POST['LOGIN'];
		$senha = $_POST['SENHA'];
		$nivel = $_POST['NIVEL'];
		$email = $_POST['EMAIL'];
		$nomeCompleto = $_POST['NOME_COMPLETO'];
		$endereco = $_POST['ENDERECO'];
		$telefone1 = $_POST['TELEFONE1'];
		$telefone2 = $_POST['TELEFONE2'];


			$busca2 = mysql_query("SELECT * FROM USUARIO WHERE LOGIN = '$login'") or die(mysql_error());

			if(mysql_num_rows($busca2) == 1){
					
				echo "<script>alert('Nome de Usuario ja Existe. Tente Novamente!');top.location.href='formularioPassageiro.html';</script>";

			}else{

				$inserir1 = 'INSERT INTO USUARIO 
				VALUES ("","'.$login.'","'.$senha.'","'.$nivel.'")';

				$inserir2 = 'INSERT INTO PASSAGEIRO 
				VALUES ("","'.$email.'","'.$nomeCompleto.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'")';
				
				mysql_query($inserir1,$conexao)or die("Erro!".mysql_error());
				mysql_query($inserir2,$conexao)or die("Erro2!".mysql_error());
				
				
				mysql_close($conexao);

				header('location:index.html');
			}
	}
}
else if(isset($_POST['PLACA']) && isset($_POST['CHASSI'])){ //usado para inserir os dados da van no banco de dados
	$Nomeusuario = $_POST['NOME_COMPLETO'];
	
	$listaMotoristas = "SELECT * FROM MOTORISTA";

	$motorista = mysql_query($listaMotoristas);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($motorista,MYSQL_BOTH)) {// identificando o motorista da seçao 
		if ($row['NOME_COMPLETO'] == $Nomeusuario) {
			$id = $row['ID_MOTORISTA']; //acessando o id da tabela motorista da seçao	
		}
		
	}

	$placa = $_POST['PLACA'];
	$chassi = $_POST['CHASSI'];
	$ano = $_POST['ANO'];
	$IdMotorista = $id; //inserindo o id do motorista 

	$busca2 = mysql_query("SELECT * FROM VAN WHERE PLACA = '$placa'") or die(mysql_error());
	echo "<br />";
	if(mysql_num_rows($busca2) == 1){
		echo "<script>alert('A van com essa placa ja esta cadastrada. Tente Novamente!');top.location.href='formularioVan.html';</script>";

	}else{

		$inserir2 = 'INSERT INTO VAN 
		VALUES ("","'.$placa.'","'.$chassi.'","'.$ano.'","'.$IdMotorista.'")';

		mysql_query($inserir2,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');
	}
}else if(isset($_POST['CIDADE_ORIGEM']) && isset($_POST['CIDADE_DESTINO'])){ //usado para inserir os dados rota no banco de dados
	
	$Nomeusuario = $_POST['NOME'];
	
	$listaMotoristas = "SELECT * FROM MOTORISTA";

	$motorista = mysql_query($listaMotoristas);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($motorista,MYSQL_BOTH)) {// identificando o motorista da seçao 
		if ($row['NOME_USUARIO'] == $Nomeusuario) {
			$id = $row['ID_MOTORISTA']; //acessando o id da tabela motorista da seçao	
		}
		
	}

	$IdMotorista = $id; //inserindo o id do motorista 
	$cidadeOrigem = $_POST['CIDADE_ORIGEM'];
	$cidadeDestino = $_POST['CIDADE_DESTINO'];
	$preco = $_POST['PRECO'];
	

	/*$busca2 = mysql_query("SELECT * FROM ROTA WHERE PLACA = '$placa'") or die(mysql_error());
	echo "<br />";
	if(mysql_num_rows($busca2) == 1){
		echo "<script>alert('A van com essa placa ja esta cadastrada. Tente Novamente!');top.location.href='formularioVan.html';</script>";

	}else{*/

		$inserir2 = 'INSERT INTO ROTA 
		VALUES ("","'.$IdMotorista.'","'.$cidadeOrigem.'","'.$cidadeDestino.'","'.$preco.'")';

		mysql_query($inserir2,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');
	//}
	$Nomeusuario = $_POST['NOME_COMPLETO'];
	
	$listaMotoristas = "SELECT * FROM MOTORISTA";

	$motorista = mysql_query($listaMotoristas);	
	// Cada linha vai para um array ($row) usando mysql_fetch_array
	while($row = mysql_fetch_array($motorista,MYSQL_BOTH)) {// identificando o motorista da seçao 
		if ($row['NOME_USUARIO'] == $Nomeusuario) {
			$id = $row['ID_MOTORISTA']; //acessando o id da tabela motorista da seçao	
		}
		
	}

	$IdMotorista = $id; //inserindo o id do motorista 
	$cidadeOrigem = $_POST['CIDADE_ORIGEM'];
	$cidadeDestino = $_POST['CIDADE_DESTINO'];
	$preco = $_POST['PRECO'];
	

	/*$busca2 = mysql_query("SELECT * FROM ROTA WHERE PLACA = '$placa'") or die(mysql_error());
	echo "<br />";
	if(mysql_num_rows($busca2) == 1){
		echo "<script>alert('A van com essa placa ja esta cadastrada. Tente Novamente!');top.location.href='formularioVan.html';</script>";

	}else{*/

		$inserir2 = 'INSERT INTO ROTA 
		VALUES ("","'.$IdMotorista.'","'.$cidadeOrigem.'","'.$cidadeDestino.'","'.$preco.'")';

		mysql_query($inserir2,$conexao)or die("Erro!".mysql_error());
		mysql_close($conexao);

		header('location:paginaMotorista.php');

}

?>


