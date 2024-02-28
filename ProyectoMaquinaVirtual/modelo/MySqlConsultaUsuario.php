<?php
include("conexion.php");


// Inicializa $totaljobs y $totalhoras como variables globales
$totaljobs = 0;
$totalhoras = 0;

function verificarUsuario($usuario) {
    $con = conectar();
    $ValidarUsuario = $con->query("SELECT * FROM rgrid WHERE rgrid.login='$usuario'");
    $con->close();
    return $ValidarUsuario->num_rows > 0;
}

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

    foreach ($usuarios as $login => $totalUsuario) {
        $resultados[] = array(
            'login' => $login,
            'Njobs' => $totalUsuario['Njobs'],
            'Nhoras' => $totalUsuario['Nhoras']
        );
    }

    return $resultados;
}

function obtenerResultados($mes, $anio, $usuario, $ini_mes, $fin_mes, $ini_anio, $fin_anio, $todos){
    // Verificar que los parámetros son válidos antes de realizar la consulta
    if ((!empty($mes) && !empty($anio) && !empty($usuario)) || (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($usuario)) || (!empty($mes) && !empty($anio) && !empty($todos)))  {
        
        $con = conectar();

        if ($mes !== 'Seleccione un mes' && $anio !== 'Seleccione un año' && !empty($usuario)) {

            // Utilizar parámetros en la consulta para mes, año y usuario
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' and rgrid.login='$usuario' ORDER BY login");
            $resultados = procesarConsultaMySql($conta_horas);
            echo "Entro aqui 1";

        } elseif ($mes == 'Seleccione un mes' && $anio == 'Seleccione un año' && !empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($usuario)) {

            // Utilizar parámetros en la consulta para consulta de usuario por periodo
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE (rgrid.anio >= '$ini_anio' AND rgrid.mes >= '$ini_mes') AND (rgrid.anio <= '$fin_anio' AND rgrid.mes <= '$fin_mes') AND rgrid.login = '$usuario' ORDER BY rgrid.anio, rgrid.mes;");
            $resultados = procesarConsultaMySql($conta_horas);
            echo "Entro aqui 2";

        } elseif ($mes !== 'Seleccione un mes' && $anio !== 'Seleccione un año' && !empty($todos)) {

            // Utilizar parámetros en la consulta para todos los usuarios con mes y año
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE rgrid.mes='$mes' and rgrid.anio='$anio' ORDER BY login");
            $resultados = procesarConsultaMySql($conta_horas);
            echo "Entro aqui 3";

        } elseif ($mes == 'Seleccione un mes' && $anio == 'Seleccione un año' && !empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($todos)) {

            // Utilizar parámetros en la consulta para todos los usuarios por periodo
            $conta_horas = $con->query("SELECT * FROM rgrid WHERE (rgrid.anio >= '$ini_anio' AND rgrid.mes >= '$ini_mes') AND (rgrid.anio <= '$fin_anio' AND rgrid.mes <= '$fin_mes') ORDER BY rgrid.anio, rgrid.mes;");
            $resultados = procesarConsultaMySql($conta_horas);
            echo "Entro aqui 4";
        }

        // Imprime lo que contiene el arreglo, solo en caso de saber qué es lo que contiene, solo para pruebas
        // print_r($resultados);

        // Cerrar la conexión después de usarla
        $con->close();
        
        return $resultados;
    }
}

?>