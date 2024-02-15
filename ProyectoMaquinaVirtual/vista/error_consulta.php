<?php
include("encabezado.php");

?>

<center>
<h3>
Error de  conexión con la base de datos <?php echo $_SESSION['mysql_error']?>

</h3>

	<img src="error_base.png" >

<!--	<button onclick="nueva_consulta()"> Click </button>
	<div> </div>
-->

<div>
<a href='../control/control_error.php'>
 <button class="boton_error" onclick=nueva_consulta()>Nueva consulta</button>
</a>
</div>


</center>

<?php
include("pie.php");
?>


<script>
function nueva_consulta(){
    $.ajax({url:"control_error.php", success:function(result){
    $("div").text(result);}
    })

}
</script>

