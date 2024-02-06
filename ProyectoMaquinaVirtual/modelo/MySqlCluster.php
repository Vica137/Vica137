<?php
include("conexion.php");

function obtenerResultados($mes, $anio, $cluster, $ini_periodo, $fin_periodo) {
    $totaljobs = 0;
    $totalhoras = 0;

    // Verificar que los parámetros son válidos antes de realizar la consulta
    if (!empty($mes) && !empty($anio) && !empty($cluster)) {
        $con = conectar();

        // Utilizar parámetros en la consulta
        $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' and rgrid.cluster='$cluster'");

        $resultados = array();

        while ($row = $conta_horas->fetch_assoc()) {
            if ($row["login"] == "TOTAL") {
                $totaljobs += $row["Njobs"];
                $totalhoras += $row["Nhoras"];
            } else {
                $resultados[] = array(
                    'login' => substr($row["login"], 8),
                    'cluster' => $row["cluster"],
                    'Njobs' => $row["Njobs"],
                    'Nhoras' => $row["Nhoras"]
                );
            }
        }

        $resultados[] = array(
            'login' => '1',
            'cluster' => $cluster,
            'Njobs' => $totaljobs,
            'Nhoras' => $totalhoras
        );

     /*   // Aquí puedes imprimir o devolver los resultados según tus necesidades
        print_r($resultados);

        // Cerrar la conexión después de usarla
        $con->close();
    } else {
        // Mensaje de error si los parámetros no son válidos
        echo json_encode(array('error' => "Por favor, proporciona un mes, un año y un cluster válidos."));
    }*/
	  // Cerrar la conexión después de usarla
        $con->close();
        return $resultados;

}
}
?>



