<?php
/*
    Fecha: 16 de enero 2023
    Objetivo: Se encarga de procesar los datos obtenidos de la vista, para mandarlos a modelo y una vez obtenido el resultado se los enviara nuevamente a vista para mostrar los resultados de manera ordenada 
*/
include("../modelo/MySqlConsultaUsuario.php");
include("../vista/encabezado.php");
include("../control/funcion_tabla.php");

function procesarFormulario() {
    // Obtener los valores del formulario
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
    $todos = isset($_POST["todos"]) && $_POST["todos"] === "todos";
    $anio = isset($_POST["anio"]) ? $_POST["anio"] : '';
    $mes = isset($_POST["mes"]) ? $_POST["mes"] : '';
    
    // Definir $ini_periodo y $fin_periodo
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
    if (($mes !== 'Seleccione un mes' && $anio !== 'Seleccione un año' && !empty($usuario)) || (!empty($ini_periodo) && !empty($fin_periodo) && !empty($usuario))) {
        // Llama a la función del modelo para generar el reporte
        $ini_mes = intval($ini_mes);
        $fin_mes = intval($fin_mes);
        $ini_anio = intval($ini_anio);
        $fin_anio = intval($fin_anio);

//Verificar si el usuaro no existe y mostrar mensaje de error
        if (!verificarUsuario($usuario)){

	header("Location: ../vista/error_usuario.php");
	die();

        } else {

            // Obtener los resultados
            $resultados = obtenerResultados($mes, $anio, $usuario, $ini_mes, $fin_mes, $ini_anio, $fin_anio, $todos);

            // Mostrar la tabla y enviar el pie de página
            mostrarTabla($resultados);
            include("../vista/pie.php");

            // Verificar resultados y mostrar mensaje de error si es necesario
            if (!$resultados) {
                $_SESSION['error_consulta'] = "consulta";
                header("Location: ../vista/vista_error.php");
                die("Error al obtener resultados de la base de datos");
            } 

        }



    } elseif ($todos) {
        // Obtener los resultados para todos los usuarios
        $resultados = obtenerResultados($mes, $anio, $usuario, $ini_mes, $fin_mes, $ini_anio, $fin_anio, $todos);

        // Mostrar la tabla y enviar el pie de página
        mostrarTabla($resultados);
        include("../vista/pie.php");

        // Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
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
