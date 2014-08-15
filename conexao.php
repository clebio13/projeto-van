<?php

$hostname = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sistema_van';

$conexao = mysql_connect($hostname,$usuario,$senha)or die("Erro na conexao com o banco!".mysql_error());

$selecionaBd = mysql_select_db($banco,$conexao) or die("Banco de dados nao existe!");

?>