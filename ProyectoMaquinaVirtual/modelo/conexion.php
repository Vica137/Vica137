<?php

function conectar(){

        $user="root";
        $pass="";
        $server="localhost";
        $db="rgrid";
        $con=new mysqli($server,$user,$pass, $db);
        if (!$con) {
		header("Location: ../vista/error_consulta.php");
		$_SESSION['mysql_error'] = mysql_error();		
		die();
		/* die('No se pudo conectar: ' . mysql_error()); */

	}
        return $con;
        mysql_close($enlace);

}
?>
