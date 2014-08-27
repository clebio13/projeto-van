<!DOCTYPE html>
<html>
<head>
	<title>Reservar Passagem</title>
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
				echo "Reserve sua Passagem";	
			}?></h1></p>

			<p class="botaoAdmin">

			<select>
			  <option value="" selected>Cidade Origem</option>
			  <option value="Jose da Penha">Jose da Penha</option>
			  <option value="Riacho de Santana">Riacho de Santana</option>
			  <option value="Rafael Fernandes">Rafael Fernandes</option>
			  <option value="Pau dos Ferros">Pau dos Ferros</option>
			</select>
			<select>
			  <option value="" selected>Cidade Destino</option>
			  <option value="Jose da Penha">Jose da Penha</option>
			  <option value="Riacho de Santana">Riacho de Santana</option>
			  <option value="Rafael Fernandes">Rafael Fernandes</option>
			  <option value="Pau dos Ferros">Pau dos Ferros</option>
			</select>
			<select>
			  <option value="" selected>Dia Saida</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			  <option value="9">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  <option value="13">13</option>
			  <option value="14">14</option>
			  <option value="15">15</option>
			  <option value="16">16</option>
			  <option value="17">17</option>
			  <option value="18">18</option>
			  <option value="19">19</option>
			  <option value="20">20</option>
			  <option value="21">21</option>
			  <option value="22">22</option>
			  <option value="23">23</option>
			  <option value="24">24</option>
			  <option value="25">25</option>
			  <option value="26">26</option>
			  <option value="27">27</option>
			  <option value="28">28</option>
			  <option value="29">29</option>
			  <option value="30">30</option>
			  <option value="31">31</option>
			</select>
			<select>
			  <option value="" selected>Hora</option>
			  <option value="6">6:00</option>
			  <option value="7">7:00</option>
			  <option value="8">8:00</option>
			  <option value="9">9:00</option>
			  <option value="10">10:00</option>			 
			</select>

			</p>
		</fieldset>
	</form>

</div>
</div>

</body>
</html>

