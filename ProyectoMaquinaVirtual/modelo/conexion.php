<?php

function conectar(){

        $user="root";
        $pass="DGT1C.0litas";
        $server="localhost";
        $db="pruebadb";
        $con=new mysqli($server,$user,$pass, $db);
        if (!$con) {
                die('No se pudo conectar: ' . mysql_error());
        }
        return $con;
        mysql_close($enlace);

}
?>