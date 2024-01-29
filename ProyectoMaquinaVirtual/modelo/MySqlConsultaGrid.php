<?php

/*
    Fecha: 28 de enero 2023
    Objetivo: Se encarga de realizar la conulta mediante los datos capturados, los cuales pueden ser año o periodo.
*/
include("conexion.php");

function obtenerResultados($anio, $ini_periodo, $fin_periodo) {
    $totaljobs = 0;
    $totalhoras = 0;

    // Verificar que los parámetros son válidos antes de realizar la consulta
    if (!empty($mes) && !empty($anio)) {
        $con = conectar();

        // Utilizar parámetros en la consulta
        $conta_horas = $con->query("SELECT * FROM rgrid WHERE pruebadb.anio='$anio'");

        $resultados = array();

        while ($row = $conta_horas->fetch_assoc()) {
            if ($row["login"] == "TOTAL") {
                $totaljobs += $row["Njobs"];
                $totalhoras += $row["Nhoras"];
            } else {
                $resultados[] = array(
                    'login' => substr($row["login"], 8),
                    'Njobs' => $row["Njobs"],
                    'Nhoras' => $row["Nhoras"]
                );
            }
        }

        $resultados[] = array(
            'login' => '1',
            'Njobs' => $totaljobs,
            'Nhoras' => $totalhoras
        );

        // Aquí puedes imprimir o devolver los resultados 
        //print_r($resultados);

        // Cerrar la conexión después de usarla
        $con->close();
    } else {
        // Mensaje de error si los parámetros no son válidos
        echo json_encode(array('error' => "Por favor, proporciona un mes, un año y un cluster válidos."));
    }
}
?>