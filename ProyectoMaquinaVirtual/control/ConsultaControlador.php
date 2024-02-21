<?php
/*
    Fecha: 16 de enero 2023
    Objetivo: Se encarga de procesar los datos obtenidos de la vista, para mandarlos a modelo y una vez obtenido el resultado se los enviara nuevamente a vista para mostrar los resultados de manera ordenada 
*/
include("../modelo/MySqlCluster.php");
include("../vista/encabezado.php");
include("../control/funcion_tabla.php");

function procesarFormulario() {
    // Obtener los valores del formulario
    $cluster = isset($_POST["cluster"]) ? $_POST["cluster"] : '';
    $anio = isset($_POST["anio"]) ? $_POST["anio"] : '';
    $mes = isset($_POST["mes"]) ? $_POST["mes"] : '';
    
    // Definir $ini_periodo y $fin_periodo
    $ini_periodo = isset($_POST["ini_periodo"]) ? $_POST["ini_periodo"] : '';
    $fin_periodo = isset($_POST["fin_periodo"]) ? $_POST["fin_periodo"] : '';

		// Definir $mes y $anio si se ha enviado un periodo
	    if (!empty($ini_periodo) && !empty($fin_periodo)) {
	        $ini_anio = substr($ini_periodo, 0, 4);
	        $ini_mes = substr($ini_periodo, 6);
	        $fin_anio = substr($fin_periodo, 0, 4);
	        $fin_mes = substr($fin_periodo, 5);
	    }
    // Validar que al menos un conjunto de datos sea válido
    if (($mes !== 'Seleccione un mes' && $anio !== 'Seleccione un año' && !empty($cluster)) || (!empty($ini_periodo) && !empty($fin_periodo) && !empty($cluster))) {
        // Llama a la función del modelo para generar el reporte
        // En el controlador
		/*echo "cluster: " . $cluster . "<br>";
		echo "anio: " . $anio . "<br>";
		echo "mes: " . $mes . "<br>";
		echo "ini_mes: " . $ini_mes . "<br>";
		echo "fin_mes: " . $fin_mes . "<br>";
        echo "ini_anio: " . $ini_anio . "<br>";
        echo "fin_anio: " . $fin_anio . "<br>";
        */
        $resultados = obtenerResultados($mes, $anio, $cluster, $ini_mes, $fin_mes, $ini_anio, $fin_anio);

        // Enviar resultados a la vista
        mostrarTabla($resultados);

        // Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
        	
            //echo "Error por que no hay datos---- ";
            header("Location: ../vista/error_datos.php");
            die();
           
        }

    } else {
    
        // Mensaje de error si no se proporcionan datos válidos 
        header("Location: ../vista/error_parametros.php");
        die();
        
    }
}

// Procesar formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    procesarFormulario();
}
?>



