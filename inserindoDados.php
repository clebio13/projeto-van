<?php
session_start();
include ("conexao.php");	//nao tem autenticaçao pois qualquer pessoa pode se cadastrar no sistema

error_reporting(E_ERROR | E_WARNING | E_PARSE); //ignorando um erro do tipo notice

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
				
				mysql_query($inserir1,$conexao)or die("Erro!".mysql_error());

				$copiaid = mysql_insert_id();//pega o id do insert anterior

				$inserir2 = 'INSERT INTO MOTORISTA 
				VALUES ("'.$copiaid.'","'.$email.'","'.$nomeCompleto.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'","'.$cnh.'")';
				
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
				mysql_query($inserir1,$conexao)or die("Erro!".mysql_error());

				$copiaid = mysql_insert_id();//pega o id do insert anterior

				$inserir2 = 'INSERT INTO PASSAGEIRO 
				VALUES ("'.$copiaid.'","'.$email.'","'.$nomeCompleto.'","'.$endereco.'","'.$telefone1.'","'.$telefone2.'")';
				
				mysql_query($inserir2,$conexao)or die("Erro2!".mysql_error());
				
				mysql_close($conexao);

				header('location:index.html');
			}
	}
}
else if(isset($_POST['PLACA']) && isset($_POST['CHASSI'])){ //usado para inserir os dados da van no banco de dados
	$Nomeusuario = $_SESSION['nomeuser'];//identifica o usuario que fez login na seçao

	$usuario = "SELECT * FROM USUARIO";
	$idusuario = mysql_query($usuario);
	while($linha = mysql_fetch_array($idusuario,MYSQL_BOTH)) {
			if ($linha['LOGIN'] == $Nomeusuario) {
				$id = $linha['ID_USUARIO']; //acessando o id do usuario que fez login
			}
			
		}
	$buscaidMotorista = mysql_query("SELECT * FROM MOTORISTA WHERE ID_MOTORISTA = '$id'") or die(mysql_error());//encontra o motorista com o mesmo id do usuario

	if(mysql_num_rows($buscaidMotorista) < 1){			
		echo "<script>alert('motorista digitado e invalido. Tente Novamente!');top.location.href='formularioVan.html';</script>";
	}else{

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
	}
}else if(isset($_POST['CIDADE_ORIGEM']) && isset($_POST['CIDADE_DESTINO'])){ //usado para inserir os dados rota no banco de dados
	$Nomeusuario = $_SESSION['nomeuser'];//identifica o usuario que fez login na sessao

	$usuario = "SELECT * FROM USUARIO";

	$idusuario = mysql_query($usuario);
	
	while($linha = mysql_fetch_array($idusuario,MYSQL_BOTH)) {
			if ($linha['LOGIN'] == $Nomeusuario) {
				$id = $linha['ID_USUARIO']; //acessando o id do usuario que fez login
			}
			
		}
	
	$buscaidMotorista = mysql_query("SELECT * FROM MOTORISTA WHERE ID_MOTORISTA = '$id'") or die(mysql_error());//encontra o motorista com o mesmo id do usuario


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
}

?>


