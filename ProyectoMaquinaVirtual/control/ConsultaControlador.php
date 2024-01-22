<?php
include("../modelo/MySqlCluster.php");

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
        include("../vista/vista_cluster.php");
        mostrarTabla($resultados);
        // Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
            die("Error al obtener resultados de la base de datos");
        }

    } elseif ((!empty($ini_periodo) || !empty($fin_periodo)) && empty($mes) && empty($anio) && !empty($cluster)) {
        // Llama a la función del modelo para generar el reporte
        $resultados = obtenerResultados('', '', $cluster, $ini_periodo, $fin_periodo);
        // Enviar resultados a la vista
        include("../vista/vista_cluster.php");
        mostrarTabla($resultados);
        // Verificar resultados y mostrar mensaje de error si es necesario
        if (!$resultados) {
            die("Error al obtener resultados de la base de datos");
        }
    } else {
        // Mensaje de error si no se proporcionan datos válidos
        echo "Por favor, proporciona al menos un conjunto de datos válido.";
    }
}

// Procesar formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    procesarFormulario();
}
?>

