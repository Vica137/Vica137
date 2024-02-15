<?php 
echo "Vista variable . $OpcionIndexCluster";
print($OpcionIndexCluster);

//sleep(10);

function redireccion(){
        if($OpcionIndexCluster == 'cluster') {
        header("Location: vista_cluster.php");
	die();
	}
/*
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
} */
}
 

//if (isset($_SESSION['opcionSeleccionada'])) {
    redireccion();
//}
?>

