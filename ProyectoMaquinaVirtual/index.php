<!-- index.php -->

<?php
/*
    require_once 'config/db.php';
    require_once 'controllers/ConsultaController.php';

    $tipoConsulta = $_POST['tipo_consulta'] ?? '';
    $meses = $_POST['meses'] ?? '';

    $consultaController = new ConsultaController();
    $consultaController->mostrarDatos($tipoConsulta, $meses);
*/ 
?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

	<!-- This site is optimized with the Yoast SEO plugin v20.8 - https://yoast.com/wordpress/plugins/seo/ -->
	<title>Home - GRID UNAM</title>
	<link rel="canonical" href="https://grid.unam.mx/" />
	<meta property="og:locale" content="es_MX" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Home - GRID UNAM" />
	<meta property="og:url" content="https://grid.unam.mx/" />
	<meta property="og:site_name" content="GRID UNAM" />
	<meta name="twitter:card" content="summary_large_image" />


<?php

    include('./vista/encabezado.php');
?>

<nav>
        <a href="./vista/vista_cluster.php?opcion=cluster">Reporte por cluster</a>
        <a href="./vista/vista_usuario.php?opcion=usuario">Reporte por usuario</a>
        <a href="./vista/vista_proyecto.php?opcion=proyecto">Reporte por proyecto</a>
        <a href="./vista/vista_grid.php?opcion=grid">Reporte Grid UNAM</a>
</nav>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar si se recibió la opción
    if (isset($_GET['opcion']) && !empty($_GET['opcion'])) {
        $_SESSION['opcionSelecciona'] = $_GET['opcion'];
    	}
	}
    ?>

<center>
	<img src="computadora_lamod.jpg" height="40%" width="40%">

</center>

<?php 
    include('./vista/pie.php');
    
	

?>


</html>
