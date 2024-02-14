<?php
include("conexion.php");


// Inicializa $totaljobs y $totalhoras como variables globales
$totaljobs = 0;
$totalhoras = 0;

function procesarConsultaMySql($conta_horas) {
    $resultados = array();
    $usuarios = array(); // Array para almacenar la suma de horas y trabajos por cada usuario

    while ($row = $conta_horas->fetch_assoc()) {
        $login = $row["login"];
        $Njobs = $row["Njobs"];
        $Nhoras = $row["Nhoras"];

        // Verificar si el usuario ya existe en el array de usuarios
        if (array_key_exists($login, $usuarios)) {
            // Si el usuario ya existe, sumar las Nhoras y Njobs
            $usuarios[$login]['Njobs'] += $Njobs;
            $usuarios[$login]['Nhoras'] += $Nhoras;
        } else {
            // Si el usuario no existe, agregarlo al array de usuarios
            $usuarios[$login] = array('Njobs' => $Njobs, 'Nhoras' => $Nhoras);
        }
    }

    // Agregar los resultados al array final con la suma de horas y trabajos por usuario
    foreach ($usuarios as $login => $totalUsuario) {
        $resultados[] = array(
            'login' => $login,
            'cluster' => $row["cluster"],
            'Njobs' => $totalUsuario['Njobs'],
            'Nhoras' => $totalUsuario['Nhoras']
        );
    }

    return $resultados;
}


function obtenerResultados($mes, $anio, $cluster, $ini_mes, $fin_mes, $ini_anio, $fin_anio){
    // Verificar que los parámetros son válidos antes de realizar la consulta
    if ((!empty($mes) && !empty($anio) && !empty($cluster)) || (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($cluster)))  {
        
        $con = conectar();

        if (!empty($mes) && !empty($anio) && !empty($cluster)) {
            // Utilizar parámetros en la consulta
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' and rgrid.cluster='$cluster' ORDER BY login");
            $resultados = procesarConsultaMySql($conta_horas);
        } elseif (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($cluster)) {
            // Utilizar parámetros en la consulta
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE (rgrid.anio >= '$ini_anio' AND rgrid.mes >= '$ini_mes') AND (rgrid.anio <= '$fin_anio' AND rgrid.mes <= '$fin_mes') AND rgrid.cluster = '$cluster' ORDER BY rgrid.anio, rgrid.mes;");
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


