<h2>Resultados de la consulta:</h2>
<table border='1'>
    <tr>
        <th>Login</th>
        <th>Cluster</th>
        <th>Número de Jobs</th>
        <th>Número de Horas</th>
    </tr>

    <?php foreach ($resultados as $fila): ?>
        <tr>
            <td><?= $fila['login'] ?></td>
            <td><?= $fila['cluster'] ?></td>
            <td><?= $fila['Njobs'] ?></td>
            <td><?= $fila['Nhoras'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>
