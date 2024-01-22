<!-- index.php -->

<?php

    require_once 'config/db.php';
    require_once 'controllers/ConsultaController.php';

    $tipoConsulta = $_POST['tipo_consulta'] ?? '';
    $meses = $_POST['meses'] ?? '';

    $consultaController = new ConsultaController();
    $consultaController->mostrarDatos($tipoConsulta, $meses);
    
?>