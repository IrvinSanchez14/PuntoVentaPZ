<?php
include_once('../conexion/connection.php');
	$con=new conexion();
	$duplicado = "call duplicado(58);";
	$bdq= $con->Ejecutar($duplicado) or die ("<script>alert('ERROR: No se permite datos duplicados')</script>");
?>