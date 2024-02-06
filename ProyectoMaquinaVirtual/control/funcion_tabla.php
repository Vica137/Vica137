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

function mostrarTabla($resultados) {
    echo "<center>";

    echo '<figure class="wp-block-table is-style-regular">';
    echo '<table>';
    echo '<tbody>';
    echo '<tr bgcolor="#9fbbff">';
    echo '<td class="has-text-align-left" data-align="left"><strong>#</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Login</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Cluster</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Número de Jobs</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Número de Horas</strong></td>';
    echo '</font>';
    echo '</tr>';

    foreach ($resultados as $key => $fila) {
        echo '<tr bgcolor="' . ($key % 2 == 0 ? '#ecf4fb' : '') . '">';
        echo '<td class="has-text-align-left" data-align="left">' . ($key + 1) . '</td>';
        echo '<td class="has-text-align-left" data-align="left">' . $fila['login'] . '</td>';
        echo '<td class="has-text-align-left" data-align="left">' . $fila['cluster'] . '</td>';
        echo '<td class="has-text-align-left" data-align="left">' . $fila['Njobs'] . '</td>';
        echo '<td class="has-text-align-left" data-align="left">' . $fila['Nhoras'] . '</td>';
        echo '</tr>';
    }

    echo '<tr>';
    echo '<td class="has-text-align-left" data-align="left">' . ($key + 2) . '</td>';
    echo '<td class="has-text-align-left" data-align="left">TOTAL</td>';
    echo '<td class="has-text-align-left" data-align="left">' . $resultados[0]['cluster'] . '</td>';
    echo '<td class="has-text-align-left" data-align="left">' . $resultados[0]['Njobs'] . '</td>';
    echo '<td class="has-text-align-left" data-align="left">' . $resultados[0]['Nhoras'] . '</td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';
    echo '<figcaption class="wp-element-caption">Tabla: Resultados de la consulta. <br>Última actualización: ' . date('F Y') . '.</figcaption>';
    echo '</figure>';
    echo "</center>";
}

?>

</html>
