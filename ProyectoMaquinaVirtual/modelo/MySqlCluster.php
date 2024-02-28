<?php
include("conexion.php");

$totaljobs = 0;
$totalhoras = 0;

function procesarConsultaMySql($conta_horas) {
    $resultados = array();
    $usuarios = array();

    while ($row = $conta_horas->fetch_assoc()) {
        $login = $row["login"];
        $Njobs = $row["Njobs"];
        $Nhoras = $row["Nhoras"];

        if (array_key_exists($login, $usuarios)) {
            $usuarios[$login]['Njobs'] += $Njobs;
            $usuarios[$login]['Nhoras'] += $Nhoras;
        } else {
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

function obtenerResultados($mes, $anio, $cluster, $ini_mes, $fin_mes, $ini_anio, $fin_anio){
    if ((!empty($mes) && !empty($anio) && !empty($cluster)) || (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($cluster)))  {
        $con = conectar();
        $query = "SELECT * FROM rgrid WHERE ";
        
        if ($mes !== 'Seleccione un mes' && $anio !== 'Seleccione un año' && !empty($cluster)) {
            $query .= "rgrid.mes='$mes' AND rgrid.anio='$anio' AND rgrid.cluster='$cluster' ";
        } elseif (!empty($ini_mes) && !empty($fin_mes) && !empty($ini_anio) && !empty($fin_anio) && !empty($cluster)) {
            $query .= "(rgrid.anio > $fin_anio OR (rgrid.anio = $ini_anio AND rgrid.mes >= $ini_mes)) AND (rgrid.anio < $fin_anio OR (rgrid.anio = $fin_anio AND rgrid.mes <= $fin_mes)) AND rgrid.cluster = '$cluster' ";
        }
        
        $query .= "ORDER BY login";
        $conta_horas = $con->query($query);
        $resultados = procesarConsultaMySql($conta_horas);
        $con->close();
        
        return $resultados;
    }
}
?>
