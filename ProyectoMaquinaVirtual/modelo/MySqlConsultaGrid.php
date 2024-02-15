<?php

/*
    Fecha: 28 de enero 2023
    Objetivo: Se encarga de realizar la conulta mediante los datos capturados, los cuales pueden ser año o periodo.
*/
include("conexion.php");

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

    /*
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
    */
    // print($resultados);  // Comentado para evitar imprimir y afectar el flujo
    return $resultados;
}


function obtenerResultados($mes, $anio, $ini_mes, $fin_mes, $ini_anio, $fin_anio) {
    

    // Verificar que los parámetros son válidos antes de realizar la consulta
    if(!empty($mes) && !empty($anio) || !empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio)){

        $con = conectar();

        if (!empty($mes) && !empty($anio)) {

            // Utilizar parámetros en la consulta
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' ORDER BY cluster");
            $resultados = procesarConsultaMySql($conta_horas);

        }elseif (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio)) {
             $conta_horas = $con->query("SELECT * FROM rgrid WHERE (anio >= '$anio' and mes >= '$mes') and (anio <= '$anio' and mes <= '$mes') order by mes");
        }
        // Aquí puedes imprimir o devolver los resultados 
        //print_r($resultados);

        // Cerrar la conexión después de usarla
        $con->close();
        return $resultados; 

    }      
}
?>