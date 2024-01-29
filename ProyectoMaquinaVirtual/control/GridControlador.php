<?php
/*
    Fecha: 28 de enero 2023
    Objetivo: Se encarga de procesar los datos obtenidos de la vista, para mandarlos a modelo y una vez obtenido el resultado se los enviara nuevamente a vista para mostrar los resultados de manera ordenada 
*/
include("../modelo/MySqlConsultaGrid.php");
include("../vista/respuesta_Grid.php");

function procesarFormulario() {
    // Obtener los valores del formulario
    $anio = isset($_POST["anio"]) ? $_POST["anio"] : '';
    $ini_periodo = isset($_POST["ini_periodo"]) ? $_POST["ini_periodo"] : '';
    $fin_periodo = isset($_POST["fin_periodo"]) ? $_POST["fin_periodo"] : '';

    // Validar que al menos un conjunto de datos sea válido
    if (!empty($anio)) {
        // Llama a la función del modelo para generar el reporte
        $resultados = obtenerResultados($anio, $ini_periodo, $fin_periodo);
        // Enviar resultados a la vista
	
        include("../vista/encabezado.php");
	mostrarTabla($resultados);
        // Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
            die("Error al obtener resultados de la base de datos");
        }

    } elseif ((!empty($ini_periodo) || !empty($fin_periodo)) && empty($anio)) {
        // Llama a la función del modelo para generar el reporte
        $resultados = obtenerResultados('', $ini_periodo, $fin_periodo);
        // Enviar resultados a la vista
	mostrarTabla($resultados);
	include("../vista/inferior.php");
	
	// Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
		include("../vista/vista_error.php");
		
            
	}
    } else {
        // Mensaje de error si no se proporcionan datos válidos 
		include("../vista/vista_error.php");
    }
}

// Procesar formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    procesarFormulario();
}
?>
