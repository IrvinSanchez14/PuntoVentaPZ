<?php 
	include("../conexion/server.php");
	$con=new conexion();
	
	$cuadrar = $_POST['cuadrar'];
	$des = $_POST['des'];
	$dife = $_POST['dife'];
	$efec = $_POST['efec'];
	$pos = $_POST['pos'];
	$compr = $_POST['compr'];
	$caja = $_POST['caja'];
	$fecha = $_POST['fecha'];
	$ids = $_POST['ids'];
	
	$q = "INSERT INTO cortez(total_a_cuadrar,total_descuentos,total_diferencia,total_efectivo,total_pos,total_compras,
	total_caja,fechatiempo,idsucursal) values($cuadrar,$des,$dife,$efec,$pos,$compr,$caja,'$fecha',$ids)";
$bdq = $con->Ejecutar($q) or die ('error');

?>
