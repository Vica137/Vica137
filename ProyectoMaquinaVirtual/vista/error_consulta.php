

<center>
<h3>
Error de  consulta
</h3>

	<img src="error_base.png" >

<!--	<button onclick="nueva_consulta()"> Click </button>
	<div> </div>
-->

<a href='../control/control_error.php'>
 <button >Nueva consulta</button>
</a>



</center>
	
<script>
function nueva_consulta(){
    $.ajax({url:"control_error.php", success:function(result){
    $("div").text(result);}
    })

}
</script>

