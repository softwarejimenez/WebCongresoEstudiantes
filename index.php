<!--Copyright ©. All rights reserved. Designed by Antonio Jimenez Martinez y Andres Ortiz Corrales -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>I Congreso de Estudiantes de Ingeniería Informática</title>
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link href="css/styles.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="./js/script.js"></script>

	<?php
	session_start();
	require "php/includes/dbhandler.php";
	//error_reporting(E_ALL ^ E_DEPRECATED);//reportar los errores de phph
	if(isset($_GET['salir'])){
		session_destroy();
		header("location:index.php");
	}

	if(!isset($_GET['page']) || empty($_GET['page'])){
		$current_page="home";
	}
	else{
		$current_page=$_GET['page'];
	}
	?>

</head>
<body>
<div class="containerSuperior">
	<div class="container">
	<?php include './php/header.php'; ?>
	<section>
		<div>
			<?php include './php/lmenu.php'; ?>
			<div class="mainContent" >
				<!-- Incluir contenido necesario -->
				<?php
				require './php/'. $current_page . '.php';
				?>
			</div>
		</div>
	</section>
	<?php include './php/footer.php'; ?>
	</div>
</div>
</body>
</html>
