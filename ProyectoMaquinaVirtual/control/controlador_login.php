<?php

if(!empty($_POST["login_button"])){
	if(empty($_POST["username"]) and empty($_POST["username"])){ //creo que esto está demás porque hay una protección en login.php
	echo "Los campos están vacios";
	
	}else {
		$username=$_POST["username"];
		$password=$_POST["password"];
		$sql=$conexion->query("select * from username where username=$username and password=$password ");
		if($datos=$sql->fetch_object()) {
			header("location:hola.php");
		} else{
			echo "<div class=alert alert_danger>ACCESO DENEGADO </div>";
		
		}


	}
	


}
