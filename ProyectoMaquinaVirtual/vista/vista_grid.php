<!DOCTYPE html>
<html lang="es-MX">
<head>	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	
	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

	<!-- This site is optimized with the Yoast SEO plugin v20.8 - https://yoast.com/wordpress/plugins/seo/ -->
	<title>Home - GRID UNAM</title>
	<link rel="canonical" href="https://grid.unam.mx/" />
	<meta property="og:locale" content="es_MX" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Home - GRID UNAM" />
	<meta property="og:url" content="https://grid.unam.mx/" />
	<meta property="og:site_name" content="GRID UNAM" />
	<meta name="twitter:card" content="summary_large_image" />

<?php
include("encabezado.php")

?>

<div id="form-container">

<form id="formulario" action="../control/GridControlador.php" method="POST">
  <h2>Reporte de uso de todo Grid UNAM</h2>
  <ul>
    <!-- <p><li>
            <label for="cluster">Cluster:</label>
                <select name="cluster" id="id_cluster">
                  <option selected>DGTIC</option>
                  <option >LAMOD</option>
                  <option >IAE</option>
                  <option >ICACC</option>
                </select>
	</li></p>
     --> 
       <li>
            <label for="anio">Año:</label>
                <select name="anio" id="anio">
                    <option selected>Seleccione un año</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
        </li></p>
        <p>
        <li>
               <label for="mes">Mes:</label>
                <select name="mes" id="id_mes">
                    <option selected>Seleccione un mes</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
	</li></p>
	<p>
	<li>
  	<label for="bdaymonth"> Inicio de periodo:</label>
  	<input type="month" id="id_ini_periodo" name="ini_periodo">
	</li></p>
	<p>
        <li>
        <label for="bdaymonth"> Fin de periodo:</label>
        <input type="month" id="id_fin_periodo" name="fin_periodo">
        </li></p>


      <!-- <p><li>
        <label for="fecha"> Fecha:</label><input type="month" id="id_fecha" name="fecha"
       min="2023-06" value="2023-06" max="2030-12"></li></p> -->

    <p>

            <button type="submit">Enviar</button>
            <button type="reset">Borrar </button>


        </p>

       </ul>
</form>
</div>


<script type="text/javascript">
  // Obtener la referencia a la lista

function myFunction(){

//  var lista_c = document.getElementById("id_cluster");
	
// Obtener el índice de la opción que se ha seleccionado

//var indiceSeleccionado_c = lista_c.selectedIndex;
	
// Con el índice y el array "options", obtener la opción seleccionada
	
//var opcionSeleccionada_c = lista_c.options[indiceSeleccionado_c];
	
// Obtener el valor y el texto de la opción seleccionada

//	var textoSeleccionado_c = opcionSeleccionada_c.text;
	
// https://uniwebsidad.com/libros/javascript/capitulo-7/utilidades-basicas-para-formularios
var lista_m = document.getElementById("id_mes");
// Obtener el índice de la opción que se ha seleccionado
var indiceSeleccionado_m = lista_m.selectedIndex;
// Con el índice y el array "options", obtener la opción seleccionada
var opcionSeleccionada_m = lista_m.options[indiceSeleccionado_m];
// Obtener el valor y el texto de la opción seleccionada
var textoSeleccionado_m = opcionSeleccionada_m.text;
//
var lista_a = document.getElementById("id_año");
// Obtener el índice de la opción que se ha seleccionado
var indiceSeleccionado_a = lista_a.selectedIndex;
// Con el índice y el array "options", obtener la opción seleccionada
var opcionSeleccionada_a = lista_a.options[indiceSeleccionado_a];
// Obtener el valor y el texto de la opción seleccionada
var textoSeleccionado_a = opcionSeleccionada_a.text;


  alert('Se ha elegido \n Año:' + textoSeleccionado_a + '\n Mes:' + textoSeleccionado_m );
  document.getElementById("formulario").submit()
  // https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_form_submit

}
</script>

<?php
include("pie.php")
?>

</html>
