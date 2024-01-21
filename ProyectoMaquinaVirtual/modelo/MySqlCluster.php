
<?php
$totaljobs = 0;
$totalhoras = 0;

// Validar y obtener los parámetros del mes y año
$mes = isset($_GET['mes']) ? $_GET['mes'] : '';
$anio = isset($_GET['anio']) ? $_GET['anio'] : '';

// Verificar que los parámetros son válidos antes de realizar la consulta
if (!empty($mes) && !empty($anio)) {
    include("./conexion.php");
    $con = conectar();

    // Utilizar parámetros en la consulta
    $conta_horas = $con->query("SELECT * FROM servicio WHERE servicio.mes='$mes' and servicio.anio='$anio' and servicio.cluster='DGTIC'");

    while ($row = $conta_horas->fetch_assoc()) {
        if ($row["login"] == "TOTAL") {
            $totaljobs += $row["Njobs"];
            $totalhoras += $row["Nhoras"];
        } else {
            echo "<tr><td>" . substr($row["login"], 8) . "</td>
                  <td>" . $row["cluster"] . "</td>
                  <td>" . $row["Njobs"] . "</td>
                  <td>" . $row["Nhoras"] . "</td></tr>";
        }
    }

    echo "<tr><td>TOTAL</td>
          <td>DGTIC</td>
          <td>" . $totaljobs . "</td>
          <td>" . $totalhoras . "</td></tr>";
} else {
    // Mensaje de error si los parámetros no son válidos
    echo "Por favor, proporciona un mes y un año válidos.";
}
?>
