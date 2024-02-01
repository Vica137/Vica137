<?php

function mostrarTabla($resultados) {
    echo "<center>";

    echo '<figure class="wp-block-table is-style-regular">';
    echo '<table>';
    echo '<tbody>';
    echo '<tr bgcolor="#77DBFD">';
    echo '<td class="has-text-align-left" data-align="left"><strong>#</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Login</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Cluster</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Número de Jobs</strong></td>';
    echo '<td class="has-text-align-left" data-align="left"><strong>Número de Horas</strong></td>';
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
