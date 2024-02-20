<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("./vista/encabezado.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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

<body>
<SCRIPT  language=JavaScript> 
function go(){

if (document.form.password.value=='12345678X%' && document.form.login.value=='gonzalo'){ 
        document.form.submit(); 
    } 
    else{ 
         alert("Porfavor ingrese, nombre de usuario y contraseña correctos."); 
    } 
} 
</SCRIPT> 
<FORM name=form action="index.php">

<P>Usuario:    <INPUT type=text name=login> 
<P>Contraseña: <INPUT type=password name=password> 
<INPUT onclick=go() type=button value=Acceder>

</FORM> 

</body>
</html>

<?php
include("./vista/pie.php");

?>
