<?php
include 'session_start.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vererinaria RoRo</title>
    <link rel="stylesheet" href="css/menuStyle.css">
  </head>
<body>
	<fieldset>
	<div class="container">
	<div class="vertical-menu">
	<a class="active2">Menu</a>
	  <a href="menu.php" class="active">Inicio</a>
	  <a href="registroD.html">Registro</a>
	  <a href="agendarC.html">Agendar</a>
	  <a href="consulta.html">Dar Consulta</a>
	  <a href="historialmedico.php">Historial Medico</a>
	  <a href="ConsultarC.php">Buscar</a>
	  <a class="active2">Modificar</a>
	 <a href="actualizarCliente.html">Actualizar Datos</a>
	</div>
	</div>
	</fieldset>


	<fieldset>
		<div>
			<form>
			<h1>Bienvenido</h1>
			<img src="img/logo2.png" height="300" width="400">
			<br><br>
	  		<a href="session_close.php">Salir</a>
			</form>
		</div>
	</fieldset>

	
	

</body>
</html>