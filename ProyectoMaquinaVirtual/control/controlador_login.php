<?php
session_start();
include("./modelo/conexion.php");


if(!empty($_POST["login_button"])){
	        $con=conectar();
	
		$username=$_POST["username"];
		$password=sha1($_POST["password"]);
		
		$sql=$con->query("SELECT * FROM users WHERE username='$username' AND password='$password' ");
		if($datos=$sql->fetch_object()) {
			$_SESSION["id"]=$datos->id;
			$_SESSION["username"]=$datos->username;
				

			
			header("location:index.php");
			die();
			
			
		} else{
			echo "<center>";
			echo "<div class=alert alert_danger>ACCESO DENEGADO </div>";
			echo "</center>";
		}
		
			$con->close();

	


}
