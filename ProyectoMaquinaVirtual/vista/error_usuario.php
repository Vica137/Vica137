<?php
include("encabezado.php");
/*include("../modelo/MySqlConsultaUsuario.php");

$validar_usuario = verificarUsuario($usuario);
print($usuario . "hola");
echo $validar_usuario; */ 

?>




<center>


<h3>


Error: el usuario ingresado no existe

</h3>

        <img src="error_base.png" >

<!--    <button onclick="nueva_consulta()"> Click </button>
        <div> </div>
-->

<div>
<a href='../control/control_error.php'>
 <button class="boton_error">Nueva consulta</button>
</a>
</div>


</center>


<?php
include("pie.php");
?>

