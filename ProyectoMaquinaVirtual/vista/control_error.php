<?php 
echo $_SESSION['opcionSeleccionada'];
echo "hola mundo";


function redireccion(){
        switch ($_SESSION['opcionSeleccionada']) {
        case "cluster":
        header("Location: vista_cluster.php");
        exit(); // Asegúrate de detener la ejecución después de la redirección
        break;
        case "usuario":
        header("Location: vista_usuario.php");
        exit();
        break;
         case "proyecto":
        header("Location: vista_proyecto.php");
        exit();
        break;
        case "grid":
        header("Location: vista_grid.php");
        exit();
        break;

        default:
        // Página por defecto si la variable no coincide con ninguna opción
        echo "default";
        header("Location: ../index.php");
        exit();
}
}

redireccion();
