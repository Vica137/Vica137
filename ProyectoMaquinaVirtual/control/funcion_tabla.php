<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <!-- This site is optimized with the Yoast SEO plugin v20.8 - https://yoast.com/wordpress/plugins/seo/ -->
    <title>Reporte de uso Grid UNAM</title>
    <link rel="canonical" href="https://grid.unam.mx/" />
    <meta property="og:locale" content="es_MX" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Home - GRID UNAM" />
    <meta property="og:url" content="https://grid.unam.mx/" />
    <meta property="og:site_name" content="GRID UNAM" />
    <meta name="twitter:card" content="summary_large_image" />

    <style>
        
        table {
          border-collapse: collapse;
          width: 50%;
        }

        th, td {
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #D6EEEE;
        }

        table {
            margin: 0 auto; 
        }

        .container {
            text-align: center;
        }
    </style>
</head>



<?php

function mostrarTabla($resultados){

    //include("../modelo/MySqlCluster.php");
    if (empty($resultados)) {
        echo 'No hay datos para mostrar.';
        return;
    }
    echo '<br>'; // Espacio en blanco para que la tabla no esté tan pegada al encabezado
    echo '<b>'; // Negritas
    echo '<figure class="wp-block-table is-style-regular">';
    echo '<table>';
    echo '<tbody>';
    echo '<tr bgcolor=#D8AEFF>';
    echo '<td class="has-text-align-left" data-align="left"><strong>#</strong></td>';
    foreach ($resultados[0] as $columna => $valor) {
        echo '<td class="has-text-align-left" data-align="left"><strong>' . $columna . '</strong></td>';
    }
    echo '</tr>';

    // Variable para sumar el total de jobs y horas
    $total_jobs = 0;
    $total_horas = 0;

    foreach ($resultados as $key => $fila) {
        echo '<tr bgcolor="' . ($key % 2 == 0 ? '#ecf4fb' : '') . '">';
        echo '<td class="has-text-align-left" data-align="left">' . ($key + 1) . '</td>';
        foreach ($fila as $columna => $valor) {
            echo '<td class="has-text-align-left" data-align="left">' . $valor . '</td>';
            if ($columna === 'Njobs') {
                $total_jobs += $valor;
            }
            if ($columna === 'Nhoras') {
                $total_horas += $valor;
            }
        }
        echo '</tr>';
    }

    echo '<tr>';
    echo '<td>TOTAL</td>';
    echo '<td></td>'; // Celda vacía para la columna intermedia
    echo '<td>' . $total_jobs . '</td>'; // Total de jobs
    echo '<td>' . $total_horas . '</td>'; // Total de horas
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';
    echo '</b>';
    echo '<div class="container">';
    echo '<figcaption class="wp-element-caption">Tabla: Resultados de la consulta. <br>Última actualización: ' . date('d ' . "/" . ' m ' . "/" . ' Y') . '.</figcaption>';
    echo '</div>';
    echo '</figure>';
}


function mostrarTablaClusterXMes($resultados, $cluster, $mes, $anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo 'Cluster: ' . $cluster ;
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Mes: ' . $mes ;
    echo ' ';
    echo 'Año: ' . $anio ;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaClusterXPeriodo($resultados, $cluster, $ini_mes, $fin_mes, $ini_anio, $fin_anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo 'Cluster: ' . $cluster ;
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Periodo del : ' . $ini_mes . ' - ' . $ini_anio . '  al ' . $fin_mes . ' - ' . $fin_anio;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaUsuarioXmes($resultados, $usuario, $mes, $anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo 'Usuario: ' . $usuario ;
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Mes: ' . $mes ;
    echo ' ';
    echo 'Año: ' . $anio ;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaTodosXmes($resultados, $mes, $anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Mes: ' . $mes ;
    echo ' ';
    echo 'Año: ' . $anio ;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaUsuarioXPeriodo($resultados, $usuario, $ini_mes, $fin_mes, $ini_anio, $fin_anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo 'Usuario: ' . $usuario ;
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Periodo del : ' . $ini_mes . ' - ' . $ini_anio . '  al ' . $fin_mes . ' - ' . $fin_anio;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaTodosXPeriodo($resultados, $todos, $ini_mes, $fin_mes, $ini_anio, $fin_anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Periodo del : ' . $ini_mes . ' - ' . $ini_anio . '  al ' . $fin_mes . ' - ' . $fin_anio;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaGridXmes($resultados, $mes, $anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo 'Grid UNAM' ;
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Mes: ' . $mes ;
    echo ' ';
    echo 'Año: ' . $anio ;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

function mostrarTablaGridXPeriodo($resultados, $ini_mes, $fin_mes, $ini_anio, $fin_anio){

    
    echo '<center>';
    echo '<h2 style="color: black;">';
    echo 'Grid UNAM ';
    echo '</h2>';
    echo '<h4 style="color: black;">';
    echo 'Periodo del : ' . $ini_mes . ' - ' . $ini_anio . '  al ' . $fin_mes . ' - ' . $fin_anio;
    echo '</h4>';
    echo '</center>';


    mostrarTabla($resultados);
}

?>

</html>
