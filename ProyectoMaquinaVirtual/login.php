
<?php
/*

// Iniciar sesión
session_start();
 
// Conexión a la base de datos
	$user="root";
        $pass="";
        $server="localhost";
        $db="rgrid";
$con=new mysqli($server,$user,$pass, $db);

$con->set_charset("utf8");

$errors = [];

// Si se ha enviado el formulario
if (isset($_POST['login_button'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
 
  // Comprobar si el nombre de usuario es válido
  $query = "SELECT * FROM users WHERE username='$username'";
  $results = mysqli_query($con, $query);
 
  if (mysqli_num_rows($results) == 1) {
    // Nombre de usuario válido, verificar contraseña
    $row = mysqli_fetch_assoc($results);
    if (password_verify($password, $row['password'])) {
      // Inicio de sesión válido
      $_SESSION['username'] = $username; 
      header('location: index.php');
    } else {
      // Contraseña inválida
      $errors[] = "Nombre de usuario/contraseña inválidos";
    }
  } else {
    // Nombre de usuario inválido
    $errors[] = "Nombre de usuario/contraseña inválidos";
  }
}
*/

include('./vista/encabezado.php')


?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="./vista/estilos.css">
  <style>
    /* Agrega estilos personalizados si es necesario */
    .login-form {
      max-width: 350px; /* Ancho máximo del formulario */
      margin: auto; /* Centrar el formulario */
    }

    .form-group input {
      width: 100%; /* Ajusta el ancho de los campos de entrada al 100% del contenedor */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="d-flex min-vh-100">
      <div class="row d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="col-md-6 form login-form">
          <form  method="POST" autocomplete="off">
            <h2 class="text-center">Inicio de sesión</h2>
	<?php
	include("./modelo/conexion.php");	
	
	include("./control/controlador_login.php");	

	?>	
            <div class="form-group mb-3">
	      <input type="text" name="username" class="form-control" placeholder="Usuario" required>
            </div>
            <div class="form-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="form-group mb-3">
              <input type="submit" name="login_button" class="form-control btn btn-primary" value="Acceder">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>



<?php

include("./vista/pie.php");

?>
