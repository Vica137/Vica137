<?php 

session_start();

print_r($_SESSION);

$OpcionIndex = $_SESSION['opcionSeleccionada'];
//sleep(10);

echo $OpcionIndex;

function redireccion(){
	
$OpcionIndex = $_SESSION['opcionSeleccionada'];
	
	switch ($OpcionIndex){

	case 'cluster':
			header("Location: ../vista/vista_cluster.php");
			die();
			break;
	case 'usuario':
        	header("Location: ../vista/vista_usuario.php");
        	die();
        	break;
    case 'proyecto':
        	header("Location: ../vista/vista_proyecto.php");
			die();  
        	break;
    case 'grid':
			header("Location: ../vista/vista_grid.php");
			die();
        	break;

     default:
        // Página por defecto si la variable no coincide con ninguna opción
        	header("Location: ../index.php");
		//	echo "default";	
			die();
			break;


	}

}
 

//if (isset($OpcionIndex)) {
	$sessionParams = session_get_cookie_params();

// Imprimir la configuración
/*
echo "Nombre de la cookie de sesión: " . $sessionParams['name'] . "<br>";
echo "Tiempo de vida de la cookie de sesión: " . $sessionParams['lifetime'] . "<br>";
echo "Ruta de la cookie de sesión: " . $sessionParams['path'] . "<br>";
echo "Dominio de la cookie de sesión: " . $sessionParams['domain'] . "<br>";
echo "Indicador de seguridad de la cookie de sesión: " . ($sessionParams['secure'] ? 'Sí' : 'No') . "<br>";
echo "Indicador de acceso HTTPOnly de la cookie de sesión: " . ($sessionParams['httponly'] ? 'Sí' : 'No') . "<br>";

if (session_status() === PHP_SESSION_ACTIVE) {
    echo "La sesión está iniciada correctamente.";
} else {
    echo "La sesión no está iniciada.";
}if (session_status() === PHP_SESSION_ACTIVE) {
    echo "La sesión está iniciada correctamente.";
} else {
    echo "La sesión no está iniciada.";
}


echo "El ID de sesión es: " . session_id();

*/
   

    redireccion();
//}
?>

