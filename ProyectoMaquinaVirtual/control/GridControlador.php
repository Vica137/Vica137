<?php
/*
    Fecha: 28 de enero 2023
    Objetivo: Se encarga de procesar los datos obtenidos de la vista, para mandarlos a modelo y una vez obtenido el resultado se los enviara nuevamente a vista para mostrar los resultados de manera ordenada 
*/
include("../modelo/MySqlConsultaGrid.php");
//include("../vista/encabezado.php");
include("../control/funcion_tabla.php");

function procesarFormulario() {
    // Obtener los valores del formulario
    $anio = isset($_POST["anio"]) ? $_POST["anio"] : '';
    $mes = isset($_POST["mes"]) ? $_POST["mes"] : '';

    $ini_periodo = isset($_POST["ini_periodo"]) ? $_POST["ini_periodo"] : '';
    $fin_periodo = isset($_POST["fin_periodo"]) ? $_POST["fin_periodo"] : '';

        // Definir $mes y $anio si se ha enviado un periodo
        if (!empty($ini_periodo) && !empty($fin_periodo)) {
            $ini_anio = substr($ini_periodo, 0, 4);
            $ini_mes = substr($ini_periodo, 5);
            $fin_anio = substr($fin_periodo, 0, 4);
            $fin_mes = substr($fin_periodo, 5);
        }    

    // Validar que al menos un conjunto de datos sea válido
    if (($mes !== 'Seleccione un mes' && $anio !== 'Seleccione un año') || (!empty($ini_periodo) && !empty($fin_periodo))) {
        //ver lo que contiene cada variable
        //echo "anio: " . $anio . "<br>";
        //echo "mes: " . $mes . "<br>";
    
        // Llama a la función del modelo para generar el reporte
        $resultados = obtenerResultados($mes, $anio, $ini_mes, $fin_mes, $ini_anio, $fin_anio);
        // Enviar resultados a la vis
        
        mostrarTabla($resultados);
        include("../vista/pie.php");
        // Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
            $_SESSION['error_consulta'] = "consulta";
            header("Location: ../vista/vista_error.php");
        }

    } else {
        
        // Mensaje de error si no se proporcionan datos válidos 
        $_SESSION['error_datos'] = "datos";   
        header("Location: ../vista/vista_error.php");
        die();
    }
}

// Procesar formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    procesarFormulario();
}
?>
