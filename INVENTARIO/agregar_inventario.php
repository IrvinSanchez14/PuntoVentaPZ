<?php
require_once 'config.php';
$idi = $_REQUEST['id_producto'];
$cantidad = $_REQUEST['cantidad'];
$id_creador = 1;
$tipos = $_REQUEST['country_no'];

for ($i = 0; $i < count($idi); $i++) {
		$idi_save = $idi[$i];
		$cantidad_save = $cantidad[$i];
		$tipo_save = $tipos[$i];
		if($tipo_save == 4){
	 
	 $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 5){
	  
	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 6){

	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 7){

	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 8){
	 
	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 9){
	  
	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 10){
	  
	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	elseif($tipo_save == 13){

	  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	else{
		 $cantidad_save;
		 $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES ($idi_save,$cantidad_save,$id_creador,$tipo_save)";
	}
	if($idi_save == 64)
	{
	
		  $ingreso_inventario ="INSERT INTO existencia_sucursal (id_ingrediente,cantidad,creador,unidad) VALUES (7,$cantidad_save,$id_creador,$tipo_save),(6,$cantidad_save,$id_creador,$tipo_save)";
		
	}
	
	if(!mysqli_query($con,$ingreso_inventario)) 
    {
        die( "ERROR: ". mysqli_error($con));
    } 
	
	}
	echo "<script>alert('DATOS GURDADOS EXITOSAMENTE');
	$('.form-control').val('');
		location.reload();</script>";


?>