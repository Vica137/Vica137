<?php
/*
    Fecha: 16 de enero 2023
    Objetivo: Se encarga de procesar los datos obtenidos de la vista, para mandarlos a modelo y una vez obtenido el resultado se los enviara nuevamente a vista para mostrar los resultados de manera ordenada 
*/
include("../modelo/MySqlCluster.php");
//include("../vista/respuesta_cluster.php");
include("../vista/encabezado.php");
include("../control/funcion_tabla.php");

function procesarFormulario() {
    // Obtener los valores del formulario
    $cluster = isset($_POST["cluster"]) ? $_POST["cluster"] : '';
    $anio = isset($_POST["anio"]) ? $_POST["anio"] : '';
    $mes = isset($_POST["mes"]) ? $_POST["mes"] : '';
    $ini_periodo = isset($_POST["ini_periodo"]) ? $_POST["ini_periodo"] : '';
    $fin_periodo = isset($_POST["fin_periodo"]) ? $_POST["fin_periodo"] : '';

    // Validar que al menos un conjunto de datos sea válido
    if (!empty($mes) && !empty($anio) && !empty($cluster)) {
        // Llama a la función del modelo para generar el reporte
        $resultados = obtenerResultados($mes, $anio, $cluster, $ini_periodo, $fin_periodo);
        // Enviar resultados a la vista
	
        //include("../vista/encabezado.php");
	//mostrarTabla($resultados);
	include("../vista/pie.php");

	// Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
	        $_SESSION['error_consulta'] = "consulta";
                header("Location: ../vista/vista_error.php");
		die("Error al obtener resultados de la base de datos");
        }

    } elseif ((!empty($ini_periodo) || !empty($fin_periodo)) && empty($mes) && empty($anio) && !empty($cluster)) {
        // Llama a la función del modelo para generar el reporte
        $resultados = obtenerResultados('', '', $cluster, $ini_periodo, $fin_periodo);
        // Enviar resultados a la vista
	
	mostrarTabla($resultados);

	include("../vista/pie.php");
	
	// Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
		//include("../vista/vista_error.php");
		$_SESSION['error_consulta'] = "consulta";	
		header("Location: ../vista/vista_error.php");
		die();		
            
	}
    } else {
        // Mensaje de error si no se proporcionan datos válidos 
	    //include("../vista/vista_error.php");
	    $_SESSION['error_datos'] = "datos";	
	    header("Location: ../vista/vista_error.php");
	    die();
    }
}



// Procesar formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    procesarFormulario();
    include("../vista/pie.php");
}
?>


