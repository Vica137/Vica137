<?php
include("conexion.php");


// Inicializa $totaljobs y $totalhoras como variables globales
$totaljobs = 0;
$totalhoras = 0;

function procesarConsultaMySql($conta_horas) {
    $resultados = array();

    while ($row = $conta_horas->fetch_assoc()) {
        // Sumar los valores a las variables globales
        $GLOBALS['totaljobs'] += $row["Njobs"];
        $GLOBALS['totalhoras'] += $row["Nhoras"];
        $resultados[] = array(
            'mes' => $row["mes"],
            'cluster' => $row["cluster"],
            'Njobs' => $row["Njobs"],
            'Nhoras' => $row["Nhoras"]
        );

    }
    // print($resultados);  // Comentado para evitar imprimir y afectar el flujo
    return $resultados;
}

function obtenerResultados($mes, $anio, $usuario, $ini_mes, $fin_mes, $ini_anio, $fin_anio){
    // Verificar que los parámetros son válidos antes de realizar la consulta
    if ((!empty($mes) && !empty($anio) && !empty($usuario)) || (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($usuario)))  {
        
        $con = conectar();

        if (!empty($mes) && !empty($anio) && !empty($usuario)) {
            // Utilizar parámetros en la consulta
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' and rgrid.login='$usuario' ORDER BY login");
            $resultados = procesarConsultaMySql($conta_horas);
        } elseif (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($usuario)) {
            // Utilizar parámetros en la consulta
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE (rgrid.anio >= '$ini_anio' AND rgrid.mes >= '$ini_mes') AND (rgrid.anio <= '$fin_anio' AND rgrid.mes <= '$fin_mes') AND rgrid.login = '$usuario' ORDER BY rgrid.anio, rgrid.mes;");
            $resultados = procesarConsultaMySql($conta_horas);
        }

        // Imprime lo que contiene el arreglo, solo en caso de saber qué es lo que contiene, solo para pruebas
        // print_r($resultados);

        // Cerrar la conexión después de usarla
        $con->close();
        
        return $resultados;
    }
}
?>


