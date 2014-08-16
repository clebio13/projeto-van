<?php 
	session_start();
if(isset($_SESSION['auth'])){
	session_unset();	
	session_destroy();
	echo "<script>alert('Voce saiu do sistema!');top.location.href='index.html';</script>";

}

?>