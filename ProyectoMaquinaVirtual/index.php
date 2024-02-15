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
session_start();
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
</head>

<?php

    include('./vista/encabezado.php');
?>

<nav>

	<a href="./vista/vista_cluster.php?opcion=cluster" class="cluster"><input type="button" value="Reporte Cluster"></a>
	<a href="./vista/vista_usuario.php?opcion=usuario" class="usuario"><input type="button" value="Reporte usuario"></a>
	<a href="./vista/vista_proyecto.php?opcion=proyecto" class="proyecto"><input type="button" value="Reporte por proyecto"></a>
	<a href="./vista/vista_grid.php?opcion=grid" class="grid"><input type="button" value="Reporte grid"></a>

<!--    <a href="./vista/vista_cluster.php?opc=cluster">Reporte por cluster</a>
        <a href="./vista/vista_usuario.php?opc=usuario">Reporte por usuario</a>
        <a href="./vista/vista_proyecto.php?opc=proyecto">Reporte por proyecto</a>
        <a href="./vista/vista_grid.php?opc=grid">Reporte Grid UNAM</a>
-->
	  <?php
	

	// Verificar si 'opcion' está configurado en la URL
	if (isset($_GET['opcion'])) {
	    // Verificar el valor de 'opcion' y establecer $_SESSION['opcionSeleccionada'] en consecuencia
	    if ($_GET['opcion'] == "cluster") {
	        $_SESSION['opcionSeleccionada'] = 'cluster';
	    } elseif ($_GET['opcion'] == "usuario") {
	        $_SESSION['opcionSeleccionada'] = 'usuario';
	    } elseif ($_GET['opcion'] == "proyecto") {
	        $_SESSION['opcionSeleccionada'] = 'proyecto';
	    } elseif ($_GET['opcion'] == "grid") {
	        $_SESSION['opcionSeleccionada'] = 'grid';
	    }
	}
	?>





</nav>


<br>
<center>
	<img src="./vista/collage_grid_UNAM.jpg" height="40%" width="40%">

</center>

<?php 
    include('./vista/pie.php');
    
	

?>


</html>
