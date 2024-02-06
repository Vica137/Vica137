<?php
include("conexion.php");

// Inicializa $totaljobs y $totalhoras como variables globales
$totaljobs = 0;
$totalhoras = 0;

function obtenerResultados($mes, $anio, $cluster, $ini_periodo, $fin_periodo ) {
    // Verificar que los parámetros son válidos antes de realizar la consulta
    if (!empty($mes) && !empty($anio) && !empty($cluster)) {
        $con = conectar();

        // Utilizar parámetros en la consulta
        $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' and rgrid.cluster='$cluster'");

        $resultados = array();

        while ($row = $conta_horas->fetch_assoc()) {
            // Sumar los valores a las variables globales
            $GLOBALS['totaljobs'] += $row["Njobs"];
            $GLOBALS['totalhoras'] += $row["Nhoras"];

            $resultados[] = array(
                'login' => $row['login'],
                'cluster' => $row["cluster"],
                'Njobs' => $row["Njobs"],
                'Nhoras' => $row["Nhoras"]
            );
        }

        // Imprime lo que contiene el arreglos, solo en caso de saber que es lo que contiene, solo para pruebas
        //print_r($resultados);

        // Cerrar la conexión después de usarla
        $con->close();
        return $resultados;
    }
}
?>
